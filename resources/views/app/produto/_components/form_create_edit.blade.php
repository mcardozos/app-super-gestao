@if (isset($produto->id))
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('produto.store') }}" method="post">
            @csrf
@endif

<select name="fornecedor_id">
    <option value="">-- Selecione o fornecedor</option>
    @foreach ($fornecedores as $fornecedor)
        <option
            value="{{ $fornecedor->id }}"{{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>
            {{ $fornecedor->nome }}</option>
    @endforeach
</select>
{{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}

<input type="text" value="{{ $produto->nome ?? old('nome') }}" class="borda_preta" name="nome" placeholder="Nome">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}

<input type="text" value="{{ $produto->descricao ?? old('descricao') }}" class="borda_preta" name="descricao"
    placeholder="Descrição">
{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

<input type="text" value="{{ $produto->peso ?? old('peso') }}" class="borda_preta" name="peso" placeholder="Peso">
{{ $errors->has('peso') ? $errors->first('peso') : '' }}

<select name="unidade_id">
    <option value="">-- Selecione a unidade de medida</option>
    @foreach ($unidades as $unidade)
        <option
            value="{{ $unidade->id }}"{{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button type="submit" class="borda-preta">Cadastrar</button>

</form>
