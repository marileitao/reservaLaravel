<?php

namespace App\Http\Controllers;

use App\Models\Mesas;
use App\Models\Reservas;
use App\Mail\ReservaCriada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ReservasFormRequest;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reservas = Reservas::all();
        // dd($reservas);
        $mensagemSucesso = session('mensagem.sucesso');
        
        return view('reservas.index')->with('reservas', $reservas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservasFormRequest $request)
    {

        $conflito = Reservas::where('data_hora_reserva', $request->data_hora_reserva)
            ->exists();

        if ($conflito) 
        {
            return back()->withErrors(['data_hora_reserva' => 'Já existe uma reserva para este horário e mesa.'])->withInput();
        }

        $mesaDisponivel = Mesas::where('capacidade', '>=', $request->quantidade_pessoas)
            ->whereNotIn('id', function ($query) use ($request) {
                $query->select('mesa_id')
                        ->from('reservas')
                        ->where('data_hora_reserva', $request->data_hora_reserva);
            })->first();

        if ($mesaDisponivel) {
            $request->merge(['mesa_id' => $mesaDisponivel->id]);
        } else {
            return back()->withErrors(['mesa_id' => 'Não há mesa disponível para a quantidade de pessoas e horário selecionado.'])->withInput();
        }
        // dd($request);
        $reserva = Reservas::create($request->all());
        
        $email = new ReservaCriada(
            $request->nome_reserva,
            $request->quantidade_pessoas,
            $request->data_hora_reserva,
        );
        Mail::to($request->user())->send($email);

        $request->session()->flash('mensagem.sucesso', "Reserva de '{$reserva->nome_reserva}' adicionada com sucesso");

        return redirect()->route('reservas.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservas $reserva)
    {
        
        return view('reservas.edit', compact('reserva'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Reservas $reserva, ReservasFormRequest $request)
    {
        $reserva->fill($request->all());
        $reserva->save();

        return redirect()->route('reservas.index')->with('mensagem.sucesso', "Reserva de '{$reserva->nome_reserva}' atualizada com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservas $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')->with('mensagem.sucesso', "Reserva de '{$reserva->nome_reserva}' removida com sucesso!");
    }
}
