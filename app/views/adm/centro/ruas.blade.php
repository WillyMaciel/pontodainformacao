@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li><a href="{{URL::to("centro")}}">Centros Comerciais</a></li>
    <li class="active">Ruas de {{$centro->nome}}</li>
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
                <h3 class="panel-title">Ruas Cadastradas de {{$centro->nome}}</h3>
            </div>
            <div class="col-md-1 col-md-offset-1"><button type="button" id="create-category" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#myModal">Novo</button></div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        Nome Rua
                    </th>
                </tr>
            </thead>
            <tbody>
                @if(isset($ruas) && !$ruas->isEmpty())
                    @foreach($ruas AS $rua)
                        <tr>
                            <td>{{$rua->nome}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>Nenhuma Rua Cadastrada no sistema</td>
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
            <form action="{{URL::to("centro/ruas")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Cadastrar Rua - {{$centro->nome}}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">Nome</div>
                        <div class="col-md-9"><input type="text" class="form-control" id="nome" name="nome" placeholder="nome" REQUIRED></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="centro_id" value="{{$centro->id}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop