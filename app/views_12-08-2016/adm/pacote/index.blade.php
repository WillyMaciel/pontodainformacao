@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Pacotes</li>
</ul>
<!-- END BREADCRUMB -->                

<script type="text/javascript">
    $(function() {
        $('#myModal').modal();
    });
</script>
<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title">Pacotes Cadastrados</h3>
            </div>
            <div class="col-md-1 col-md-offset-1"><button type="button" id="create-category" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#myModal">Novo</button></div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome do Pacote</th>
                    <th>Valor</th>
                    <th>Número de Vezes</th>
                    <th>Válido por(em dias)</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($pacotes) && !$pacotes->isEmpty())
                    @foreach($pacotes AS $pacote)
                        <tr>
                            <td>{{$pacote->nome}}</td>
                            <td>{{$pacote->valor}}</td>
                            <td>{{$pacote->vezes}}x</td>
                            <td>{{$pacote->valido_por}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>Nenhum Pacote Cadastrado no sistema</td>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("pacotes/save")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Criar Pacote
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">Nome</div>
                        <div class="col-md-9"><input type="text" class="form-control" id="nome" name="nome" placeholder="nome" REQUIRED></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Valor</div>
                        <div class="col-md-9"><input type="text" class="form-control money" data-thousands="." data-decimal="," data-prefix="R$ " id="nome" name="valor" placeholder="Valor do pacote" REQUIRED></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Vezes</div>
                        <div class="col-md-9"><input type="text" class="form-control numbersOnly" id="nome" name="vezes" placeholder="Número de vezes" REQUIRED></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Válido por</div>
                        <div class="col-md-9"><input type="text" class="form-control numbersOnly" id="nome" name="valido_por" placeholder="Validade em dias" REQUIRED></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop