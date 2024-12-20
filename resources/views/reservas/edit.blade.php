<x-layout title="Editar reservas">

    <h2 class="text-center mb-4 text-black">Editar Reserva</h2>


    <form action="{{ route('reservas.update', $reserva->id) }}" method="post">
    @csrf
    @method('PUT')

    <!-- <x-reservas.form :action="route('reservas.update', $reserva->id)" :nome_reserva="$reserva->nome_reserva" :update="true"/> -->
        <div class="myBackground">
            <div class="row py-5 d-flex  justify-content-between">
                
                <div class="col-md-6 mb-3">
                    <label for="nome_reserva" class="form-label text-dark">Nome da Reserva:</label>
                    <input type="text"
                        autofocus
                        id="nome_reserva"
                        name="nome_reserva"
                        class="form-control @error('nome_reserva') is-invalid @enderror"
                        value="{{ old('nome_reserva', $reserva->nome_reserva ?? '') }}"
                        placeholder="Insira o nome da reserva">
                    @error('nome_reserva')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="quantidade_pessoas" class="form-label text-dark">Quantidade de Pessoas:</label>
                    <input type="number"
                        id="quantidade_pessoas"
                        name="quantidade_pessoas"
                        class="form-control @error('quantidade_pessoas') is-invalid @enderror"
                        value="{{ old('quantidade_pessoas', $reserva->quantidade_pessoas ?? '') }}"
                        placeholder="Número de pessoas"
                        min="1" max="20">
                    @error('quantidade_pessoas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="data_hora_reserva" class="form-label text-dark">Data e Hora da Reserva:</label>
                    <input type="datetime-local"
                        id="data_hora_reserva"
                        name="data_hora_reserva"
                        class="form-control @error('data_hora_reserva') is-invalid @enderror"
                        value="{{ old('data_hora_reserva', $reserva->data_hora_reserva ?? '') }}">
                    @error('data_hora_reserva')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary btn-lg">Atualizar Reserva</button>
                </div>

            </div>
        </div>
    </form>
</x-layout>
