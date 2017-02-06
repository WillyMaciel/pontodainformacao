@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Categorias</li>
</ul>
<!-- END BREADCRUMB -->                

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                @if(empty($parent_id))
                    <h3 class="panel-title">Categorias Cadastradas</h3>
                @else
                    <h3 class="panel-title">Sub-Categorias Cadastradas para a categoria: {{$category->nome}}</h3>
                @endif
            </div>
            <div class="col-md-1 col-md-offset-1"><button type="button" id="create-category" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#myModal">Novo</button></div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        @if(empty($parent_id))
                            Nome Categoria
                        @else
                            Nome SubCategorias
                        @endif
                    </th>
                    <!--<th>Total de Sub Categorias</th>-->
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($categories) && !$categories->isEmpty())
                    @foreach($categories AS $category)
                        <tr>
                            <td>{{$category->nome}}</td>
                            <!--<td>{{$category->totSubCategories()}}</td>-->
                            <td>
                                <!--<a href="{{URL::to("categorias/subcategorias/$category->id")}}">
                                    <button type="button" class="btn btn-warning btn-lg active">listar sub-categorias</button>
                                </a>-->
                                <a href="{{URL::to("categorias/delete/$category->id")}}">
                                    <button type="button" class="btn btn-danger btn-lg active">excluir</button>
                                </a>
                                <button type="button" id="add-category" class="btn btn-primary btn-lg active" data-id="{{$category->id}}" data-toggle="modal" data-target="#myModal2">Nova Imagem</button>
                                @if(!empty($category->caminho_completo))
                                <button type="button" id="ver-imagem" class="btn btn-info btn-lg active" data-id="{{$category->id_imagem}}" data-caminho="{{$category->caminho_completo}}" data-toggle="modal" data-target="#myModal3">Ver Imagem</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>Nenhuma Categoria Cadastrada no sistema</td>
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
            <form action="{{URL::to("categorias/save")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        @if(empty($parent_id))
                            Criar Categoria
                        @else
                            Criar Sub-Categoria
                        @endif
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">Nome</div>
                        <div class="col-md-9"><input type="text" class="form-control" id="nome" name="nome" placeholder="nome" REQUIRED></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="parent_id" value="{{$parent_id}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("categorias/upload")}}" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Nova Imagem
                    </h4>
                </div>
                <div class="modal-body">
                    <p>
                        <div class="row">
                            <label class="col-md-3 control-label">
                                Imagem
                            </label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="file" accept="image/*" REQUIRED>
                            </div>
                        </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id_categoria">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Fazer Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Ver Imagem
                    </h4>
                </div>
                <div class="modal-body text-center" id="modal-image"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <a href="#" id="deletar-imagem" class="btn btn-danger">Deletar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@stop