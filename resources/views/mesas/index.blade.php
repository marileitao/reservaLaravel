<x-layout title="Mesas">

    <a href="{{route('mesas.create')}}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach($mesas as $mesa)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $mesa->nome_mesa }}

                <form action="{{route('mesas.destroy', $mesa->id)}}" method="post">

                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">X</button>

                </form>
            
            </li>
        @endforeach
    </ul>
</x-layout>