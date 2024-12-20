<x-layout title="Nova mesa">

    <form action="{{route('mesas.store')}}" method="post">
    
        @csrf
        
        <div class="row mb-3">
            <div class="col-4">
            <label for="capacidade" class="form-label">Capacidade:</label>
                <input type="number" 
                        id="capacidade" 
                        name="capacidade" 
                        class="form-control"
                        value="{{old('capacidade')}}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

</x-layout>
