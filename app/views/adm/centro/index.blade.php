@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Centros Comerciais</li>
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
                <h3 class="panel-title">Centros comerciais Cadastrados</h3>
            </div>
            <div class="col-md-1 col-md-offset-1"><button type="button" id="create-category" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#myModal">Novo</button></div>
        </div>
    </div>
    <div class="panel-body">
        <!--<table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        Nome Centro comerical
                    </th>
                    <th>Quantidade de Ruas</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($centros) && !$centros->isEmpty())
                    @foreach($centros AS $centro)
                        <tr>
                            <td>{{$centro->nome}}</td>
                            <td>{{$centro->totRuas()}}</td>
                            <td>
                                <a href="{{URL::to("centro/ruas/$centro->id")}}">
                                    <button type="button" class="btn btn-warning btn-lg active">listar Ruas</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>Nenhum Centro Comercial Cadastrado no sistema</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif
            </tbody>
        </table>-->
        <div class="row">
             @if(isset($centros) && !$centros->isEmpty())
                @foreach($centros AS $centro)
                    <div class="col-sm-3">
                        <span class="glyphicon glyphicon-remove text-danger deleteAttribute" data-id="{{$centro->id}}" data-centro="{{$centro->id}}" data-string="{{$centro->nome}}" data-action="{{ URL::to("delete/centro") }}" style="cursor:pointer"></span>

                        <span class="glyphicon glyphicon-edit text-primary pull-right edit-buttom" data-id="{{$centro->id}}" data-centro="{{$centro->id}}" data-string="{{$centro->nome}}" data-toggle="modal" data-target="#modalEdit" style="cursor:pointer"></span>

                        <a href="{{URL::to("usuario/index/$centro->id")}}">
                            <button type="button" class="col-sm-12 btn btn-default btn-lg active" style="height: 80px;">{{$centro->nome}}</button>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info text-bold"><h3>Nenhum Centro Comercial Cadastrado no sistema!</h3></div>
            @endif
        </div>
    </div>
</div>
<!-- END DEFAULT DATATABLE -->



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("centro/save")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Criar Centro Comercial</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">Nome</div>
                        <div class="col-md-9"><input type="text" class="form-control" id="nome" name="nome" placeholder="nome" REQUIRED></div>
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

<!-- Modal Edit-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("centro/update")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar Centro Comercial</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">Nome</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="nomeEdit" name="nome" placeholder="nome" REQUIRED>
                            <input type="hidden" id="idEdit" name="id" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    $('.edit-buttom').click(function()
    {
        var centro, id;
        centro = $(this).attr('data-string');
        id = $(this).attr('data-id');

        $('#nomeEdit').val(centro);
        $('#idEdit').val(id);

        console.log(centro, id);


    });
</script>
@stop