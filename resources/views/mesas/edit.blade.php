<x-layout title="Editar mesa '{{mesas->id}}'">
    <x-mesas.form :action="route('reservas.update', $reserva->id)" :nome_reserva="$reserva->nome_reserva" :update="true"/>
</x-layout>
