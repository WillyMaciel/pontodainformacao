@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Meus Dados</li>
</ul>
<!-- END BREADCRUMB -->        

    
<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="glyphicon glyphicon-user"></span> Meus Dados</h2>
</div>
<!-- END PAGE TITLE -->                   
<!-- PAGE CONTENT WRAPPER -->
<form action="{{URL::to("meusdados/save")}}" method="post" enctype="multipart/form-data">
    <div class="page-content-wrap">
        <div class="row">

            <!-- START JUSTIFIED TABS -->
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#tab8" data-toggle="tab">Dados de Login</a></li>
                    <li><a href="#tab9" data-toggle="tab">Dados da Empresa</a></li>
                </ul>
                <div class="panel-body tab-content">
                    <div class="tab-pane active" id="tab8">
                        
                        <h2>Dados de Login</h2>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Nome*
                                </div>
                                <div class="col-md-9">
                                    <input name="nome" placeholder="Nome" class="form-control" value="" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Sobrenome*
                                </div>
                                <div class="col-md-9">
                                    <input name="sobrenome" placeholder="Sobrenome" class="form-control" value="" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    E-mail*
                                </div>
                                <div class="col-md-9">
                                    <input name="email" placeholder="E-mail" class="form-control" value="" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    CPF*
                                </div>
                                <div class="col-md-9">
                                    <input name="cpf" placeholder="CPF" id="cpf" class="form-control" value="" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Senha
                                </div>
                                <div class="col-md-9">
                                    <input type="password" name="senha" placeholder="Senha" class="form-control" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Confirmação de senha
                                </div>
                                <div class="col-md-9">
                                    <input type="password" name="senha_confirma" placeholder="Confirme senha" class="form-control" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Telefone*
                                </div>
                                <div class="col-md-9">
                                    <input name="telefone" placeholder="Telefone Fixo" class="form-control telefone-fixo telefone" value="" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Celular*
                                </div>
                                <div class="col-md-9">
                                    <input name="celular" placeholder="Telefone Celular" class="form-control telefone-celular celular" value="" />
                                </div>
                            </div>
                        </p>

                    </div>
                    <div class="tab-pane" id="tab9">
                        
                        <h2>Dados da Empresa</h2>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Nome*
                                </div>
                                <div class="col-md-9">
                                    <input name="nome_company" placeholder="Nome da Empresa" class="form-control" value="" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Centro*
                                </div>
                                <div class="col-md-9">
                                    <select name="centro" id="centro" class="form-control select" >
                                        <option value="">Centros</option>
                                        @foreach($centros as $centro)
                                            <option value="{{$centro->id}}" >{{$centro->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Rua*
                                </div>
                                <div class="col-md-9">
                                    <select name="rua" id="rua" class="form-control select" >
                                        <option value="">Ruas</option>
                                        @if(!empty($ruas))
                                            @foreach($ruas as $rua)
                                                <option value="{{$rua->id}}" >{{$rua->nome}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="numero_company" placeholder="Número" class="form-control" value="" />
                                </div>
                                <div class="col-md-4">
                                    <input name="loja_company" placeholder="Loja" class="form-control" value="" />
                                </div>
                                <div class="col-md-4">
                                    <input name="andar_company" placeholder="Andar" class="form-control" value="" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    E-mail*
                                </div>
                                <div class="col-md-9">
                                    <input name="email_company" placeholder="E-mail Comercial" class="form-control" value="" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Site*
                                </div>
                                <div class="col-md-9">
                                    <input name="site_company" placeholder="Site da Empresa" class="form-control" value="" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Telefone*
                                </div>
                                <div class="col-md-9">
                                    <input name="telefone_company" placeholder="Telefone Comercial" class="form-control celular" value="" />
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Logotipo Loja:
                                </div>
                                <div class="col-md-9">
                                    <input name="logotipo" multiple type="file" id="file-simple"/>
                                </div>
                            </div>
                        </p>
                        
                        <!-- <p>
                            <div class="row">
                                <div class="col-md-3">
                                    Tags
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="tags" name="tags_company" class="" placeholder="Informe suas tags separadas por vírgula(','), por exemplo, 'Informática, notebook, tecnologia, etc...'" />
                                    <span class="label label-info label-form"> Informe suas tags separadas por vírgula(','), por exemplo, 'Informática, notebook, tecnologia, etc...' </span>
                                    <br />
                                    <small>As tags servem para outros usuários encontrarem você na pesquisa!</small><br/><br/>
                                    <small>*Apenas os dados da empresa estarão disponíveis no site.</small>
                                </div>
                            </div>
                        </p> -->

                        
                    </div>
                      
                </div>
            </div>                                         
            <!-- END JUSTIFIED TABS -->

            <div class="row">
                <div class="col-md-12" style="position: relative;">
                    <input type="Submit" id="create-category" class="btn btn-primary btn-lg active" value="Cadastrar" />
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
@stop

@section('scripts')
<script type="text/javascript">
$(document).ready(function()
{
    $("#tags").tagsInput({
           'defaultText': "",
        });

    $("#file-simple").fileinput({
            language: "pt-BR",
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-danger",
            fileType: "any",
            uploadAsync: false
    });     
});        
</script>
@stop