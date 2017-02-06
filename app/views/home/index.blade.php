@extends('template.index')

@section('content')

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Link</a></li>                    
    <li class="active">Painel de Controle</li>
</ul>
<!-- END BREADCRUMB -->                

<div class="page-title">                    
    <h2><span class="fa fa-desktop"></span> Página Inicial</h2>
</div>                   

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Painel de Controle</h3>
                </div>
                <div class="panel-body">
                    <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{URL::to("categorias/categorias-solicitadas")}}">
                                <div class="widget widget-default widget-item-icon">
                                    <div class="widget-item-left">
                                        <span class="glyphicon glyphicon-tags"></span>
                                    </div>                             
                                    <div class="widget-data">
                                        <div class="widget-int num-count">{{$categoriasSolicitadas}}</div>
                                        <div class="widget-title">Novas solicitações de categorias</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{URL::to("usuario/solicitacao-cliente")}}">
                                <div class="widget widget-default widget-item-icon">
                                    <div class="widget-item-left">
                                        <span class="fa fa-user"></span>
                                    </div>                             
                                    <div class="widget-data">
                                        <div class="widget-int num-count">{{$solicitacoes}}</div>
                                        <div class="widget-title">Novas solicitações de clientes</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{URL::to("usuario")}}">
                                <div class="widget widget-default widget-item-icon">
                                    <div class="widget-item-left">
                                        <span class="fa fa-group"></span>
                                    </div>                             
                                    <div class="widget-data">
                                        <div class="widget-int num-count">{{$clientes}}</div>
                                        <div class="widget-title">Clientes Cadastrados</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <!--<div class="col-md-4">
                            <a href="{{URL::to("produto")}}">
                                <div class="widget widget-default widget-item-icon">
                                    <div class="widget-item-left">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>                             
                                    <div class="widget-data">
                                        <div class="widget-int num-count">{{$produtosAtivos}}</div>
                                        <div class="widget-title">Produtos Ativos</div>
                                    </div>
                                </div>
                            </a>
                        </div>-->
                        <!--<div class="col-md-4">
                            <a href="{{URL::to("produto")}}">
                                <div class="widget widget-default widget-item-icon">
                                    <div class="widget-item-left">
                                        <span class="glyphicon glyphicon-list"></span>
                                    </div>                             
                                    <div class="widget-data">
                                        <div class="widget-int num-count">{{$meusProdutos}}</div>
                                        <div class="widget-title">Meus Produtos</div>
                                    </div>
                                </div>
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->   

@stop