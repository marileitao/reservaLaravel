<x-layout title="Reservas">
    <div class="background-banner hero text-center">
        <div>
            <h1>Bem-vindo ao Restaurante!</h1>
            <p>Experimente o melhor da culinária local e internacional.</p>
            <a href="#reserva" class="btn btn-secondary">Faça sua Reserva</a>
            <a href="#menu" class="btn btn-secondary">Veja nosso menu</a>
        </div>
    </div>
    <body>
        <section id="menu" class="py-5 myBackground">
            <div class="container">
                <div class="row">

                    <h2 class="text-center mb-4">Nosso Menu</h2>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="prato-um"></div>
                            <div class="card-body bg-light text-dark">
                                <h5 class="card-title">Prato 1</h5>
                                <p class="card-text">Uma deliciosa opção de prato principal.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="prato-dois"></div>
                            <div class="card-body bg-light text-dark">
                                <h5 class="card-title">Prato 2</h5>
                                <p class="card-text">Uma opção leve e saborosa.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="prato-tres"></div>
                            <div class="card-body bg-light text-dark">
                                <h5 class="card-title">Prato 3</h5>
                                <p class="card-text">O prato perfeito para qualquer ocasião.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="reserva" class="py-5 text-black">
            <div class="container">
                <h2 class="text-center mb-4 text-black">Gerenciar Reservas</h2>

                <div class="d-flex justify-content-between mb-4">
                    <a href="{{route('reservas.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Adicionar nova reserva</a>
                </div>

                @if($reservas->isEmpty())
                    <div class="alert alert-danger text-center text-black" role="alert">
                        Nenhuma reserva encontrada.
                    </div>
                @else
                    <table class="table table-striped table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nome da Reserva</th>
                                <th scope="col">Data e Hora</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservas as $reserva)
                                <tr>
                                    <td>{{ $reserva->nome_reserva }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reserva->data_hora_reserva)->format('d/m/Y H:i') }}</td>
                                    <td class="d-flex text-center justify-content-center">
                                        <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-primary btn-sm me-2">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="post" onsubmit="return confirm('Tem certeza de que deseja excluir esta reserva?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </section>   
    </body>

</x-layout>