@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Parâmetros</li>
</ul>
<!-- END BREADCRUMB -->                
<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title">Parâmetros</h3>
            </div>
            
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($textos) && !$textos->isEmpty())
                    @foreach($textos AS $texto)
                        <tr>
                            <td>{{$texto->id}}</td>
                            <td>{{$texto->titulo}}</td>
                            <td>{{$texto->descricao}}</td>
                            <td><a href="{{URL::to("parametros/edit")}}/{{$texto->id}}"><button type="button" class="btn btn-warning btn-lg active" >Editar</button></a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>Nenhum parâmetro Cadastrado no sistema</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- END DEFAULT DATATABLE -->

@stop