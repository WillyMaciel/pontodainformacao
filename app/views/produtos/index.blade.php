@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Produtos</li>
</ul>
<!-- END BREADCRUMB -->                

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">                                
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title">Produtos Cadastrados pela empresa {{$usuario->company_name}}</h3>
            </div>
            <div class="col-md-1 col-md-offset-1"><a href="{{URL::to("produto/novo")}}"><button type="button" class="btn btn-primary btn-lg active">Novo</button></a></div>
        </div>
        
    </div>
    <div class="panel-body">
        <form method="get">
            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Pesquisar:<input type="search" name="nome" class="form-control " placeholder="Nome ou sobrenome ou email" aria-controls="DataTables_Table_0" value="{{Input::get('nome')}}">&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Pesquisar</button></label></div>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Data de Atualização</th>
                    <th>Habilitado</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($produtos) && !$produtos->isEmpty())
                    @foreach($produtos AS $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{substr($produto->descricao, 0, 25)}}</td>
                            <td>{{$produto->quantidade}}</td>
                            <td>{{$produto->preco}}</td>
                            <td>{{Formatter::dateDbToString($produto->updated_at)}}</td>
                            <td>{{Formatter::getStatusSimNao($produto->status)}}</td>
                            <td>
                                <a href="{{URL::to("produto/editar/$produto->id")}}">
                                    <button type="button" id="create-category" class="btn btn-warning btn-lg active"><span class="fa fa-pencil"></span></button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Nenhum Produto Cadastrado no sistema</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Total de usuários: {{$numProdutosTot}}</div>
        <!-- <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" id="DataTables_Table_0_previous">Anterior</a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0">6</a></span><a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="7" tabindex="0" id="DataTables_Table_0_next">Próximo</a></div> -->
        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
            {{$produtos->appends(array('pagination' => Input::get('pagination'),'nome'=>Input::get('nome')))->links();}}
        </div>
    </div>
</div>
<!-- END DEFAULT DATATABLE -->

@stop