@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('app.fornecedor.listar') }}" method="post">
                    @csrf
                    <input type="text" class="borda_preta" name="nome" placeholder="Nome">
                    <input type="text" class="borda_preta" name="site" placeholder="site">
                    <input type="text" class="borda_preta" name="uf" placeholder="UF">
                    <input type="text" class="borda_preta" name="email" placeholder="Email">
                    <button type="submit" class="borda-preta">Pesquisar</button>

                </form>

            </div>
        </div>

    </div>




@endsection
