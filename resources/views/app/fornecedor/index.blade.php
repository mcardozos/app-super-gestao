<h3>Fornecedor</h3>

{{-- Comentário padrão do blade, não exibindo pelo interpretador do navegador --}}


@php
    //este é um exemplo de utilização do php puro dentro do blade.
    /*
    if(){

    }elseif{

    }
    */
@endphp

{{-- @dd($fornecedores); --}}

{{-- @foreach ($fornecedores as $fornecedor)
    Fornecedor: {{ $fornecedor['nome'] }}
    <br>
    Status: {{ $fornecedor['status'] }}
    <br>
    CNPJ: {{ $fornecedor['cnpj'] ?? 'Não informado' }}
    <br>
    Telefone: {{ $fornecedor['ddd'] ?? '' }} - {{ $fornecedor['telefone'] ?? '' }}
    <br>
    <hr>
@endforeach --}}

@forelse ($fornecedores as $fornecedor)
    Indice: {{ $loop->iteration }}
    <br>
    Fornecedor: {{ $fornecedor['nome'] }}
    <br>
    Status: {{ $fornecedor['status'] }}
    <br>
    CNPJ: {{ $fornecedor['cnpj'] ?? 'Não informado' }}
    <br>
    Telefone: {{ $fornecedor['ddd'] ?? '' }} - {{ $fornecedor['telefone'] ?? '' }}
    <br>
    <hr>
@empty
    Não existem fornecedores cadastrados.
@endforelse



{{-- @switch($fornecedores[0]['ddd'])
    @case('11')
        São Paulo - SP
    @break

    @case('32')
        Juiz de fora - MG
    @break

    @case('85')
        Fortaleza - CE
    @break

    @default
        Localidade não identificada.
@endswitch --}}







{{-- @if (count($fornecedores) && count($fornecedores) < 10)
    <h3>Existem fornecedores cadastrados</h3>
@elseif (count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Não existem fornecedores cadastrados</h3>

@endif --}}
