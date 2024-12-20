<x-layout title="Nova reserva">
    <h2 class="text-center mb-4 text-black">Nova Reserva</h2>
    <form action="{{ route('reservas.store') }}" method="post">
        @csrf
        <div class="row">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class="col-md-6 mb-3">
                <label for="nome_reserva" class="form-label text-black">Nome da Reserva:</label>
                <input type="text"
                    autofocus
                    id="nome_reserva" 
                    name="nome_reserva" 
                    class="form-control @error('nome_reserva') is-invalid @enderror"
                    value="{{ old('nome_reserva') }}"
                    placeholder="Seu nome">
                @error('nome_reserva')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="quantidade_pessoas" class="form-label text-black">Quantidade de pessoas:</label>
                <input type="number" 
                    id="quantidade_pessoas" 
                    name="quantidade_pessoas" 
                    class="form-control @error('quantidade_pessoas') is-invalid @enderror"
                    value="{{ old('quantidade_pessoas') }}"
                    placeholder="Número de pessoas">
                @error('quantidade_pessoas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="data_hora_reserva" class="form-label text-black">Dia da reserva:</label>
                <input type="datetime-local" 
                    id="data_hora_reserva" 
                    name="data_hora_reserva" 
                    class="form-control @error('data_hora_reserva') is-invalid @enderror"
                    value="{{ old('data_hora_reserva') }}">
                @error('data_hora_reserva')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>          
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

</x-layout>
