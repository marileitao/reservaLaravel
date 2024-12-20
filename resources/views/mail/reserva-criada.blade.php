
@component('mail::message')
    
# {{$nome_reserva}}

Prezado(a),

É com prazer que confirmamos sua reserva para {{$nome_reserva}}, com mesa reservada para {{$quantidade_pessoas}} pessoas, no dia {{$data_hora_reserva}}.

Estamos ansiosos para recebê-lo(a) e tornar esse momento ainda mais especial. Caso precise de mais informações ou queira fazer algum ajuste em sua reserva, não hesite em nos contatar.


Acesse aqui para visualizar sua reserva:

@component('mail::button', ['url' => route('reservas.index')])
    Ver reserva
@endcomponent

@endcomponent