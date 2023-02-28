@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('produto-detalhe.store') }}" method="post">
            @csrf
@endif

<input type="text" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" class="borda_preta" name="produto_id" placeholder="produto_id">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

<input type="text" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" class="borda_preta" name="comprimento" placeholder="Comprimento">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

<input type="text" value="{{ $produto_detalhe->largura ?? old('largura') }}" class="borda_preta" name="largura" placeholder="Largura">
{{ $errors->has('largura') ? $errors->first('largura') : '' }}

<input type="text" value="{{ $produto_detalhe->altura ?? old('altura') }}" class="borda_preta" name="altura" placeholder="Altura">
{{ $errors->has('altura') ? $errors->first('altura') : '' }}

<select name="unidade_id">
    <option value="">-- Selecione a unidade de medida</option>
    @foreach ($unidades as $unidade)
        <option
            value="{{ $unidade->id }}"{{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button type="submit" class="borda-preta">Cadastrar</button>

</form>
