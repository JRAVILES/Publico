@extends('layouts.master')

@section('content')

<nav class="navbar navbar-default" role="navigation">
    <ul class="nav navbar-nav">    
        {{ Form::open(array('method' => 'GET', 'route' => array('planos.index'))) }}
        <table class="table table-striped">
            <tr>
                <th>{{ Form::select('sel_pesq', array('0' => 'Código', '1' => 'Descrição'), $sel_pesq, ['class' => 'form-control']) }}</th>
                <th>{{ Form::text('txt_pesq',  $txt_pesq, array('placeholder' => 'Pesquisa', 'class' => 'form-control')) }}</th>
                <th>{{ Form::submit('Pesquisar', array('class' => 'btn btn-success')) }}</th>
            </tr>
        </table>
        {{ Form::close() }}
    </ul>
</nav><br>
    
<div class="col-md-12">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ link_to_route('planos.create', '  Adicionar  ', null, array('class' => 'btn btn-primary')) }}</th>
                </tr>
            </thead>
        </table>
    </div>
                


    

@if($planos->count())
<div class="col-md-12">
    <table class="table table-bordered table-striped">
        <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Validade(Dias)</th>
                    <th>Prioridade Menu</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
        </thead>
        <tbody>
            @foreach($planos as $plano)
            <tr>
                <td>{{ $plano->descricao }}</td>
                <td>{{ 'R$ ' . number_format($plano->valor, 2) }}</td>
                <td>{{ $plano->qtd_dias }}</td>
                <td>{{ $plano->prioridade_menu }}</td>
                <td>{{ link_to_route('planos.show', 'Visualizar', array($plano->id), array('class' => 'btn btn-info')) }}</td>
                <td>{{ link_to_route('planos.edit', 'Editar', array($plano->id), array('class' => 'btn btn-warning')) }}</td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('planos.destroy', $plano->id))) }}
                    {{ Form::submit('Excluir', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
    <div class="alert alert-info col-md-4" style="margin-top: 15px">Nenhum registro encontrado.</div>
@endif

@stop