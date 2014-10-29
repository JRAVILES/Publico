@extends('layouts.master')

@section('content')

<nav class="navbar navbar-default" role="navigation">
    <ul class="nav navbar-nav">    
        {{ Form::open(array('method' => 'POST', 'route' => array('menus.search'))) }}
        <table class="table table-striped">
            <tr>
                <th>{{ Form::select('sel_pesq', array('0' => 'Código', '1' => 'Descrição'), $sel_pesq, ['class' => 'form-control']) }}</th>
                <th>{{ Form::text('txt_pesq',  $txt_pesq, array('placeholder' => 'Pesquisa', 'class' => 'form-control')) }}</th>
                <th>{{ Form::select('sel_ativo', array('1' => 'Ativo', '0' => 'Inativo', '2' => 'Todos'), $sel_ativo, ['class' => 'form-control']) }}</th>
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
                    <th>{{ link_to_route('menus.create', '  Adicionar  ', null, array('class' => 'btn btn-primary')) }}</th>
                </tr>
            </thead>
        </table>
    </div>
                


    

@if($menus->count())
<div class="col-md-12">
    <table class="table table-bordered table-striped">
        <thead>
                <tr>
                    <th>Desrição</th>
                    <th>Pai</th>
                    <th>Rota</th>
                    <th>Tipo</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->descricao }}</td>
                <td>{{ $menu->pai->descricao }}</td>
                <td>{{ $menu->route }}</td>
                <td>{{ $menu->tipo }}</td>
                <td>{{ link_to_route('menus.show', 'Visualizar', array($menu->id), array('class' => 'btn btn-info')) }}</td>
                <td>{{ link_to_route('menus.edit', 'Editar', array($menu->id), array('class' => 'btn btn-warning')) }}</td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('menus.destroy', $menu->id))) }}
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