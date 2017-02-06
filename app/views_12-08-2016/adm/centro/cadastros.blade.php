@extends('template.index')

@section('content')

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Centros Comerciais</li>
</ul>
<!-- END BREADCRUMB -->                
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
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Ruas <button class="pull-right btn btn-sm btn-primary" data-toggle="modal" data-target="#myModalRuas">Novo</button></div>
                <div class=" panel-body">
                    @if(count($ruas) > 0)
                    <table class="table table-hover">
                        @foreach($ruas as $rua)
                        <tr>
                            <td>
                                <span class="glyphicon glyphicon-edit text-primary pull-right edit-buttom-rua" data-id="{{$rua->id}}" data-centro="{{$centro->id}}" data-string="{{$rua->nome}}" data-toggle="modal" data-target="#editModalRua" style="cursor:pointer"></span>

                                <span class="glyphicon glyphicon-remove text-danger deleteAttribute pull-right" data-id="{{$rua->id}}" data-centro="{{$centro->id}}" data-string="{{$rua->nome}}" data-action="{{ URL::to("delete/rua") }}" style="cursor:pointer"></span> {{$rua->nome}}                                
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <div class="alert alert-warning">Nenhuma Rua Cadastrado!</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Pacotes <button class="pull-right btn btn-sm btn-primary" data-toggle="modal" data-target="#myModalPacote">Novo</button></div>
                <div class=" panel-body">
                    @if(count($pacotes) > 0)
                    <table class="table table-hover">
                        @foreach($pacotes as $pacote)
                        <tr>
                            <td>
                                {{$pacote->nome}}
                            </td>
                            <td>{{$pacote->vezes}}x</td>
                            <td>{{$pacote->valor}}</td>
                            <td>{{$pacote->valido_por}} dias</td>
                            <td>{{$pacote->tags}} Tags</td>
                            <td>
                                <span class="glyphicon glyphicon-remove text-danger deleteAttribute" data-id="{{$pacote->id}}" data-centro="{{$centro->id}}" data-string="{{$pacote->nome}}" data-action="{{ URL::to("delete/pacote") }}" style="cursor:pointer"></span>

                                <span class="glyphicon glyphicon-edit text-primary edit-buttom-pacote" data-id="{{$pacote->id}}" data-centro="{{$centro->id}}" data-string="{{$pacote->nome}}" data-toggle="modal" data-vezes="{{$pacote->vezes}}" data-valor="{{$pacote->valor}}" data-valido="{{$pacote->valido_por}}" data-target="#editModalPacote" data-favorito="{{$pacote->favorito}}" data-categoria="{{$pacote->categoria}}" data-tags="{{$pacote->tags}}" style="cursor:pointer"></span>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <div class="alert alert-warning">Nenhum Pacote Cadastrado!</div>
                    @endif
                </div>
            </div>    
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias <button class="pull-right btn btn-sm btn-primary" data-toggle="modal" data-target="#myModalCategoria">Novo</button></div>
                <div class=" panel-body">
                    @if(count($categorias) > 0)
                    <table class="table table-hover">
                        @foreach($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->nome}}</td>
                            <td>
                                @if(!empty($categoria->caminho_completo))
                                <button type="button" class="btn btn-info btn-xs active ver-imagem" data-id="{{$categoria->id_imagem}}" data-caminho="{{$categoria->caminho_completo}}" data-toggle="modal" data-target="#myModalCategoriaImgVer">Ver Imagem</button>
                                @else
                                <button type="button" class="btn btn-primary btn-xs active add-category" data-id="{{$categoria->id}}" data-toggle="modal" data-target="#myModalCategoriaImgUp">Nova Imagem</button>
                                @endif
                            </td>
                            <td>
                                <span class="glyphicon glyphicon-remove text-danger deleteAttribute" data-id="{{$categoria->id}}" data-centro="{{$centro->id}}" data-string="{{$categoria->nome}}" data-action="{{ URL::to("delete/categoria") }}" style="cursor:pointer"></span>

                                <span class="glyphicon glyphicon-edit text-primary edit-buttom-categoria" data-id="{{$categoria->id}}" data-centro="{{$centro->id}}" data-string="{{$categoria->nome}}" data-toggle="modal" data-target="#modalCategoriaEdit" style="cursor:pointer"></span>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <div class="alert alert-warning">Nenhuma Categoria Cadastrado!</div>
                    @endif
                </div>
            </div>    
        </div>
    </div>
</div>
<!-- END DEFAULT DATATABLE -->
<!-- Modal Rua -->
<div class="modal fade" id="myModalRuas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

<!-- Modal Rua EDIT -->
<div class="modal fade" id="editModalRua" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("centro/rua-update")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Editar Rua - {{$centro->nome}}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">Nome</div>
                        <div class="col-md-9"><input type="text" class="form-control" id="modalRua-nome-edit" name="nome" placeholder="nome" REQUIRED></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="modalRua-id_rua-edit" name="id_rua" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--myModalPacote-->
<div class="modal fade" id="myModalPacote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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


                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-3">Nome</div>
                            <div class="col-md-9"><input type="text" class="form-control" id="modalPacote-nome" name="nome" placeholder="nome" REQUIRED></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Vezes</div>
                            <div class="col-md-9"><input type="text" class="form-control numbersOnly" id="modalPacote-vezes" name="vezes" placeholder="Número de vezes" REQUIRED></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Valor</div>
                            <div class="col-md-9"><input type="text" class="form-control money" data-thousands="." data-decimal="," data-prefix="R$ " id="modalPacote-valor" name="valor" placeholder="Valor do pacote" REQUIRED></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">N° de Tags</div>
                            <div class="col-md-9"><input type="text" class="form-control numbersOnly" id="modalPacote-tags" name="tags" placeholder="Numero de Tags do pacote" REQUIRED></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Válido por</div>
                            <div class="col-md-9"><input type="text" class="form-control numbersOnly" id="modalPacote-valido" name="valido_por" placeholder="Validade em dias" REQUIRED></div>
                        </div>                        
                    </div>

                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6">Categoria</div>

                            <div class="col-md-6">
                                <label class="switch">
                                    <input type="checkbox" id="modalPacote-categoria" name="categoria" id="categoria" />
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">Favorito</div>

                            <div class="col-md-6">
                                <label class="switch">
                                    <input type="checkbox" id="modalPacote-favorito" name="favorito" id="favorito" />
                                    <span></span>
                                </label>
                            </div>
                        </div>                        
                    </div>

                    <div style="clear: both"></div>

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

<!--myModalPacoteEDIT-->
<div class="modal fade" id="editModalPacote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("pacotes/update")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Editar Pacote
                    </h4>
                </div>
                <div class="modal-body">

                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-3">Nome</div>
                            <div class="col-md-9"><input type="text" class="form-control" id="modalPacoteEdit-nome" name="nome" placeholder="nome" REQUIRED></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Vezes</div>
                            <div class="col-md-9"><input type="text" class="form-control numbersOnly" id="modalPacoteEdit-vezes" name="vezes" placeholder="Número de vezes" REQUIRED></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Valor</div>
                            <div class="col-md-9"><input type="text" class="form-control money" data-thousands="." data-decimal="," data-prefix="R$ " id="modalPacoteEdit-valor" name="valor" placeholder="Valor do pacote" REQUIRED></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">N° de Tags</div>
                            <div class="col-md-9"><input type="text" class="form-control numbersOnly" id="modalPacoteEdit-tags" name="tags" placeholder="Numero de Tags do pacote" REQUIRED></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Válido por</div>
                            <div class="col-md-9"><input type="text" class="form-control numbersOnly" id="modalPacoteEdit-valido" name="valido_por" placeholder="Validade em dias" REQUIRED></div>
                        </div>                        
                        <div class="row">
                            <div class="col-md-3">Centro</div>
                            <div class="col-md-9">
                                <!-- INPUT SELECT DE CENTRO -->
                                @include('adm.centro.inc_input_centro_id')
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6">Categoria</div>

                            <div class="col-md-6">
                                <label class="switch">
                                    <input type="checkbox" id="modalPacoteEdit-categoria" name="categoria" id="categoria" />
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">Favorito</div>

                            <div class="col-md-6">
                                <label class="switch">
                                    <input type="checkbox" id="modalPacoteEdit-favorito" name="favorito" id="favorito" />
                                    <span></span>
                                </label>
                            </div>
                        </div>                        
                    </div>

                    <div style="clear: both"></div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="modalPacoteEdit-id" name="id_pacote" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--myModalCategoria-->
<div class="modal fade" id="myModalCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("categorias/save")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Criar Categoria
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

<!--myModalCategoriaEDIT-->
<div class="modal fade" id="modalCategoriaEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("categorias/update")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Atualizar Categoria
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">Nome</div>
                        <div class="col-md-9"><input type="text" class="form-control" id="modalCategoriaEdit-nome" name="nome" placeholder="nome" REQUIRED></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="modalCategoriaEdit-id" name="id_categoria" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalCategoriaImgUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <input type="hidden" name="centro_id" value="{{$centro->id}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Fazer Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalCategoriaImgVer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <input type="hidden" name="centro_id" value="{{$centro->id}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <a href="#" id="deletar-imagem" class="btn btn-danger">Deletar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    $('.edit-buttom-rua').click(function()
    {
        var rua, id_rua;
        rua = $(this).attr('data-string');
        id_rua = $(this).attr('data-id');

        $('#modalRua-nome-edit').val(rua);
        $('#modalRua-id_rua-edit').val(id_rua);

        console.log(rua, id_rua);

    });

    $('.edit-buttom-pacote').click(function()
    {
        var id, nome, valor, vezes, valido, id_centro, favorito, categoria;
        id = $(this).attr('data-id');
        nome = $(this).attr('data-string');
        valor = $(this).attr('data-valor');
        vezes = $(this).attr('data-vezes');
        valido = $(this).attr('data-valido');
        id_centro = $(this).attr('data-centro');
        favorito = $(this).attr('data-favorito');
        categoria = $(this).attr('data-categoria');
        tags = $(this).attr('data-tags');
        
        $('#modalPacoteEdit-id').val(id);
        $('#modalPacoteEdit-nome').val(nome);
        $('#modalPacoteEdit-valor').val(valor);
        $('#modalPacoteEdit-vezes').val(vezes);
        $('#modalPacoteEdit-valido').val(valido);        
        $('#modalPacoteEdit-centro-option' + id_centro).attr('selected', 'selected');
        $('#modalPacoteEdit-tags').val(tags);

        if(favorito == 1)
        {
            $('#modalPacoteEdit-favorito').prop('checked', true);
        }
        else
        {
            $('#modalPacoteEdit-favorito').prop('checked', false);
        }
        if(categoria == 1)
        {
            $('#modalPacoteEdit-categoria').prop('checked', true);
        }
        else
        {
            $('#modalPacoteEdit-categoria').prop('checked', false);
        }

        $('#modalPacoteEdit-centro').selectpicker('refresh');

        

        console.log(categoria, favorito);

    });

    $('.edit-buttom-categoria').click(function()
    {
        var id, nome;
        id = $(this).attr('data-id');
        nome = $(this).attr('data-string');        
        
        $('#modalCategoriaEdit-id').val(id);
        $('#modalCategoriaEdit-nome').val(nome);      

        console.log(id, nome);

    });
</script>
@stop