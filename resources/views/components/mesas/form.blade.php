<form action="{{$action}}" method="post">
   
    @csrf

    @if($update)
    @method('PUT')
    @endif
    
    <div class="mb-3">
        <label for="capacidade" class="form-label">Capacidade:</label>
        <input type="number" 
                id="capacidade" 
                name="capacidade" 
                class="form-control"
                @isset($capacidade)value="{{$capacidade}}"@endisset>
    </div>

    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>