@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li><a href="{{URL::to("produto")}}">Meus produtos</a></li>
    <li class="active">Novo Produto</li>
</ul>
<!-- END BREADCRUMB -->    
<?php 
function categoryRecursive($category, $titulo, $arrNeedle){
    $option = '';
    if($category->totSubCategories() > 0){
        $subCategory = $category->subcategories;
        foreach($subCategory as $sub){
            $newTitlo = $titulo.' -> '.$sub->nome;
            $selected = '';
            if(isset($arrNeedle) && !empty($arrNeedle) && in_array($sub->id,$arrNeedle)){
                $selected = "SELECTED";
            }
            $option .= '<option value="'.$sub->id.'" '.$selected.'>'.$newTitlo.'</option>';
            $option .= categoryRecursive($sub,$newTitlo,$arrNeedle);
        }
    }
    return $option;
}
?>    

<script type="text/javascript">
    $(function() {
        $('#myModal').modal();
    });
</script>       
<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="glyphicon glyphicon-th"></span> Produto</h2>
</div>
<!-- END PAGE TITLE -->                   
<!-- PAGE CONTENT WRAPPER -->
<form action="{{URL::to("produto/save")}}" method="post">
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">                            
                        <div class="tocify-content">
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Nome*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="nome" placeholder="Nome" class="form-control" value="{{$produto->nome or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Descrição*
                                    </div>
                                    <div class="col-md-9">
                                        <textarea rows="5" name="descricao" id="descricao" placeholder="Descrição do produto" maxlength="355" class="form-control">{{$produto->descricao or ''}}</textarea>
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Preço*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="preco" placeholder="Preço" class="form-control money" value="{{$produto->preco or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Quantidade*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="quantidade" placeholder="Quantidade" id="quantidade" class="form-control numbersOnly" value="{{$produto->quantidade or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Cor
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="cor" placeholder="Cor" class="form-control" id="cor" value="{{$produto->cor or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Modelo
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="modelo" placeholder="Modelo" class="form-control" value="{{$produto->modelo or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Peso*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="peso" placeholder="Peso, por exemplo, 23 kg" class="form-control" value="{{$produto->peso or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Garantia*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="garantia" placeholder="Garantia, por exemplo, 7 dias úteis" class="form-control" value="{{$produto->garantia or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Habilitado?
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control" name="status" id="status">
                                            <option value="1">Sim</option>
                                            <option value="2">Não</option>
                                        </select>
                                    </div>
                                </div>
                            </p>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">                            
                        <div class="tocify-content">
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Categorias*
                                    </div>
                                    <div class="col-md-9"> 
                                        <select multiple="multiple" name="categories_id[]" id="categorias" class="form-control">
                                            @if(isset($categorias) && !$categorias->isEmpty())
                                                @foreach($categorias as $categoria)
                                                    <option value="{{$categoria->id}}" @if(isset($categoriasArray) && !empty($categoriasArray) && in_array($categoria->id,$categoriasArray)) SELECTED @endif >{{$categoria->nome}}</option>
                                                    {{categoryRecursive($categoria,$categoria->nome,$categoriasArray)}}
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </p>
                            @if(!isset($produto))
                                <p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Imagens
                                        </div>
                                        <div class="col-md-9">
                                            Só poderá colocar imagens depois de cadastrar este produto!
                                        </div>
                                    </div>
                                </p>
                            @else
                                <h2>Imagens Cadastradas</h2>
                                <p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="button" id="create-category" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#myModal">Nova Imagem</button>
                                        </div>
                                    </div>
                                </p>
                                <p>
                                    <div class="row">
                                        @foreach($produto->imagens AS $imagem)
                                            <div class="col-md-4">
                                                <a class="gallery-item" href="/{{$imagem->caminho_completo}}" title="{{$imagem->nome}}" data-gallery="">
                                                <div class="image">
                                                    <img src="/{{$imagem->caminho_completo}}" alt="{{$imagem->nome}}" class="col-md-10">
                                                </div>
                                                <div class="meta">
                                                    <strong><a href="{{URL::to("produto/delete-upload/$imagem->id")}}">Remover</a></strong><br/>
                                                    <span>Nome: {{$imagem->nome}}</span><br/>
                                                    <span>Ordem: {{$imagem->ordem}}</span>
                                                </div>
                                            </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </p>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="position: relative;">
                    @if(isset($produto))
                        <input type="hidden" name="id" value="{{$produto->id}}">
                    @endif
                    <input type="Submit" id="create-category" class="btn btn-primary btn-lg active" value="@if(isset($produto)) Atualizar Produto @else Cadastrar Produto @endif" />
                </div>
            </div>
            <div class="col-md-3" style="position: relative;">
                <div id="tocify"></div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                                                 
    </div>            
    <!-- END PAGE CONTENT -->
</form>


@if(isset($produto))
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{URL::to("produto/upload")}}" method="post" enctype="multipart/form-data" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">
                            Nova Imagem
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Imagem
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="file" accept="image/*" REQUIRED>
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Ordem
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control numbersOnly" name="order" REQUIRED>
                                    <small>Ordem serve para ordernar as imagens. A imagem de número 1 será a capa do seu produto.</small>
                                </div>
                            </div>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="{{$produto->id}}" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Fazer Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
@stop