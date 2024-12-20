<?php

namespace App\Http\Controllers;

use App\Models\Mesas;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use App\Http\Requests\MesasFormRequest;

class MesasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mesas = Mesas::all();
        // dd($mesas);
        // $mensagemSucesso = session('mensagem.sucesso');
        
        return view('mesas.index')->with('mesas', $mesas);
    }

    public function create()
    {

        if (Mesa::count() >= 15) {
            return redirect()->route('mesas.index')->with('error', 'O limite de 15 mesas foi atingido.');
        }

        return view('mesas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        if (Mesa::count() >= 15) {
            return redirect()->route('mesas.index')->with('error', 'O limite de 15 mesas foi atingido.');
        }
    
        $mesa = new Mesa();
        $mesa->nome = $request->nome;
        $mesa->save();
    
        $request->session()->flash('mensagem.sucesso', "Mesa número '{$mesa->nome_reserva}' adicionada com sucesso");
        return redirect()->route('mesas.index');
    }

    public function edit(Mesas $mesas)
    {
        return view('mesas.edit')->with('mesas', $mesas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Mesas $mesas, Request $request)
    {
        $mesas->fill($request->all());
        $mesas->save();

        return redirect()->route('mesas.index')->with('mensagem.sucesso', "Mesa número '{$mesas->id}' atualizada com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mesas $mesas)
    {
        $mesas->delete();

        return redirect()->route('mesas.index')->with('mensagem.sucesso', "Mesa número '{$mesas->id}' removida com sucesso!");
    }

}
