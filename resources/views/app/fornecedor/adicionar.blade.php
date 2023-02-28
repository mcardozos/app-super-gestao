@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                
                {{ $msg ?? '' }}
                
                <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                    @csrf
                    <input type="text" value="{{ $fornecedor->nome ?? old('nome') }}" class="borda_preta" name="nome" placeholder="Nome">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text"  value="{{ $fornecedor->site ?? old('site') }}" class="borda_preta" name="site" placeholder="site">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" value="{{ $fornecedor->uf ?? old('uf') }}" class="borda_preta" name="uf" placeholder="UF">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type="text" value="{{ $fornecedor->email ?? old('email') }}" class="borda_preta" name="email" placeholder="Email">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>

                </form>

            </div>
        </div>

    </div>


@endsection
