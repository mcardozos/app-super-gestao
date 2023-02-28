@if (isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('cliente.store') }}" method="post">
            @csrf
@endif

<input type="text" value="{{ $cliente->nome ?? old('nome') }}" class="borda_preta" name="nome" placeholder="Nome">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}

<button type="submit" class="borda-preta">Cadastrar</button>

</form>
