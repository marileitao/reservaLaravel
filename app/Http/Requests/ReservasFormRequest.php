<?php

namespace App\Http\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ReservasFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome_reserva' => ['required', 'min:3'],
            'quantidade_pessoas' => ['required', 'integer', 'min:1'],
            'data_hora_reserva' => [
                'required',
                'date',
                'after_or_equal:today',
                function ($attribute, $value, $fail) {
                    $dataHora = Carbon::parse($value);

                    if ($dataHora->hour < 18 || $dataHora->hour > 23) {
                        $fail(__('validation.custom', ['attribute' => 'data_hora_reserva'])); // Mensagem de erro personalizada para horário
                    }
                    if ($dataHora->isSunday()) {
                        $fail(__('validation.custom_day', ['attribute' => 'data_hora_reserva'])); // Mensagem de erro personalizada para domingo
                    }
                },
            ],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'nome_reserva.required' => 'O campo Nome da Reserva é obrigatório e precisa de pelo menos 3 caracteres.',
            'quantidade_pessoas.required' => 'O campo Quantidade de Pessoas é obrigatório.',
            'quantidade_pessoas.integer' => 'A Quantidade de Pessoas deve ser um número inteiro.',
            'quantidade_pessoas.min' => 'A Quantidade de Pessoas deve ser no mínimo 1.',
            'data_hora_reserva.required' => 'O campo Data da Reserva é obrigatório.',
            'data_hora_reserva.date' => 'A Data da Reserva precisa ser uma data válida.',
            'data_hora_reserva.after_or_equal' => 'A Data da Reserva não pode ser no passado.',
            'data_hora_reserva.custom' => 'As reservas devem ser feitas entre 18:00 e 23:59.',
            'data_hora_reserva.custom_day' => 'Reservas não são permitidas aos domingos.',
            'mesa_id.exists' => 'A Mesa selecionada não existe.',
            'user_id.exists' => 'O Usuário selecionado não existe.',
        ];
    }
}
