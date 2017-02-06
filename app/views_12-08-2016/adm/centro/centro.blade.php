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
                <h3 class="panel-title text-bold">{{$centro->nome}}</h3>
            </div>
            <!--<div class="col-md-1 col-md-offset-1"><button type="button" id="create-category" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#myModal">Novo</button></div>-->
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            
        </div>
    </div>
</div>
<!-- END DEFAULT DATATABLE -->
@stop