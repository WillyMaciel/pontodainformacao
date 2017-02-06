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
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">                            
                        <div class="tocify-content">
                            <h2>Dados de Login</h2>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Nome*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="nome" placeholder="Nome" class="form-control" value="{{$user->nome or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Sobrenome*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="sobrenome" placeholder="Sobrenome" class="form-control" value="{{$user->sobrenome or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        E-mail*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="email" placeholder="E-mail" class="form-control" value="{{$user->email or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        CPF*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="cpf" placeholder="CPF" id="cpf" class="form-control" value="{{$user->cpf or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Senha
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="senha" placeholder="Redefina sua senha" class="form-control" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Confirmação de senha
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="senha_confirma" placeholder="Confirme sua nova senha" class="form-control" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Telefone*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="telefone" placeholder="Telefone Fixo" class="form-control telefone-fixo telefone" value="{{$user->telefone or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Celular*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="celular" placeholder="Telefone Celular" class="form-control telefone-celular celular" value="{{$user->celular or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Pacote
                                    </div>
                                    <div class="col-md-5">
                                        @if(!empty($user->pacote_id))
                                            {{$user->pacote->nome}}
                                        @else
                                            Pacote Grátis
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        @if(Auth::user()->perfil == 1)
                                            <button type="button" id="create-category" class="btn btn-warning btn-lg active" data-toggle="modal" data-target="#myModal">Alterar Pacote</button>
                                        @elseif(Auth::user()->perfil == 2 && ($user->data_vencimento <= date( "Y-m-d H:i:s", strtotime( "+3 day" )) || $user->data_vencimento > date("Y-m-d H:i:s")))
                                            <button type="button" id="create-category" class="btn btn-warning btn-lg active" data-toggle="modal" data-target="#myModal">Solicitar Plano</button>
                                        @endif
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Vencimento
                                    </div>
                                    <div class="col-md-9">                                   

                                        @if($user->data_vencimento)
                                            <?php
                                            $data_vencimento = new Carbon($user->data_vencimento);
                                            $data_increment = new Carbon($user->data_vencimento);
                                            $data_increment->subDays(6);

                                            // echo '<pre>';
                                            // echo var_dump(Carbon::Now());
                                            // echo var_dump($data_vencimento);
                                            // echo var_dump($data_increment);
                                            // echo '</pre>';
                                            ?>

                                            {{Formatter::dateDbToString($user->data_vencimento)}}
                                            <span class="label @if(Carbon::Now()->between($data_vencimento, $data_increment)) label-warning @elseif(Carbon::Now()->lt($data_vencimento)) label-success @else label-danger @endif">
                                                @if($data_vencimento->lt(Carbon::Now()))
                                                    Vencido a {{$data_vencimento->diffForHumans(Carbon::Now(), true)}}
                                                @else
                                                Faltam {{$data_vencimento->diffForHumans(Carbon::Now(), true)}} para o vencimento
                                                @endif
                                           
                                            </span>                                        
                                            @if($user->pacote)
                                                &nbsp;
                                                @if(Carbon::Now()->between($data_vencimento, $data_increment) || Carbon::Now()->gt($data_vencimento))
                                                    <a href="{{URL::to('meusdados/renovar-pacote/'.$user->id)}}" id="btn_renovar_pacote" class="btn btn-warning"><i class="glyphicon glyphicon-repeat"></i>Renovar Pacote ({{$user->pacote->valido_por}} dias) </a>
                                                @endif
                                            @else
                                               <!--  <span class="label label-danger">
                                                Sem data de vencimento.
                                                </span> -->
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </p>
                            @if(Auth::user()->perfil == 1)
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Status
                                    </div>
                                    <div class="col-md-9">
                                        <label class="switch">
                                            <input type="checkbox" name="status" id="favorito" @if($user->status == 1) CHECKED @endif />
                                            <span></span>
                                        </label>

                                        <!-- <select name="status" id="status" class="form-control select" >
                                            <option value="1" @if($user->status == 1) SELECTED @endif >ATIVO</option>
                                            <option value="2" @if($user->status == 2) SELECTED @endif >INATIVO</option>
                                        </select> -->
                                    </div>
                                </div>
                            </p>

                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Favorito
                                    </div>
                                    <div class="col-md-9">
                                        <label class="switch">
                                            <input type="checkbox" name="favorito" id="favorito" @if($user->favorito == 1) CHECKED @endif />
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Categoria
                                    </div>
                                    <div class="col-md-9">
                                        <label class="switch">
                                            <input type="checkbox" name="categoria" id="favorito" @if($user->categoria == 1) CHECKED @endif />
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </p>     
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">                            
                        <div class="tocify-content">
                            <h2>Dados da Empresa</h2>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Nome*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="nome_company" placeholder="Nome da Empresa" class="form-control" value="{{$user->company_name or ''}}" />
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
                                            @foreach($centros as $centro)
                                                <option value="{{$centro->id}}" @if($centro->id == $user->centro_id) SELECTED @endif >{{$centro->nome}}</option>
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
                                                    <option value="{{$rua->id}}" @if($rua->id == $user->rua_id) SELECTED @endif>{{$rua->nome}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input name="numero_company" placeholder="Número" class="form-control" value="{{$user->company_numero or ''}}" />
                                    </div>
                                    <div class="col-md-4">
                                        <input name="loja_company" placeholder="Loja" class="form-control" value="{{$user->company_loja or ''}}" />
                                    </div>
                                    <div class="col-md-4">
                                        <input name="andar_company" placeholder="Andar" class="form-control" value="{{$user->company_andar or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        E-mail*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="email_company" placeholder="E-mail Comercial" class="form-control" value="{{$user->company_email or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Site*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="site_company" placeholder="Site da Empresa" class="form-control" value="{{$user->company_site or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Telefone*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="telefone_company" placeholder="Telefone Comercial" class="form-control celular" value="{{$user->company_telefone or ''}}" />
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
                            
                            <p>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{URL::to("usuario/categories-user/$user->id")}}" type="button" class="btn btn-info btn-lg active">Alterar Categorias</a>
                                    </div>
                                </div>
                            </p>
                            
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Tags
                                    </div>
                                    <div class="col-md-9">
                                        @if(!$user->pacote)
                                            <span class="label label-danger label-form">Você pode utilizar 20 TAGS - Pacote Grátis</span><br/>
                                        @else
                                            <span class="label label-info label-form">Você pode utilizar {{$user->pacote->tags}} TAGS - {{$user->pacote->nome}}</span><br/>
                                        @endif

                                        <input type="text" id="tags" name="tags_company" class="" value="{{$user->company_tags}}" placeholder="Informe suas tags separadas por vírgula(','), por exemplo, 'Informática, notebook, tecnologia, etc...'" />
                                        <span class="label label-info label-form"> Informe suas tags separadas por vírgula(','), por exemplo, 'Informática, notebook, tecnologia, etc...' </span>
                                        <br />
                                        <span class="label label-warning label-form">As tags servem para outros usuários encontrarem você na pesquisa!</span><br/>
                                        <span class="label label-warning label-form">*Apenas os dados da empresa estarão disponíveis no site.</span>
                                    </div>
                                </div>
                            </p>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="position: relative;">
                    <input type="hidden" name="id" value="{{$id}}">
                    <input type="Submit" id="create-category" class="btn btn-primary btn-lg active" value="Atualizar Dados" />
                </div>
            </div>
            <div class="col-md-3" style="position: relative;">
                <div id="tocify"></div>
            </div>

            <div style="clear: both;"></div>

        </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                                                 
    </div>            
    <!-- END PAGE CONTENT -->
</form>


<!-- Modal -->
@if(Auth::user()->perfil == 1)
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("meusdados/alterar-pacote")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Alterar pacote
                    </h4>
                </div>
                <div class="modal-body">
                    @if(!$pacotes->isEmpty())
                        <div class="row">
                            <div class="col-md-3">Pacote</div>
                            <div class="col-md-9">
                                <select class="form-control" id="pacote" name="pacote" REQUIRED>
                                    <option value="0" data-formatter="{{ Formatter::dataAtual() }}" >Selecione pacote</option>
                                    @foreach($pacotes as $pacote)
                                        <option data-formatter="{{ Formatter::dataAtualDBPlusDays($pacote->valido_por) }}" value="{{$pacote->id}}">{{$pacote->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px; display: none;">
                            <div class="col-md-3">Data de Vencimento</div>
                            <div class="col-md-9">
                                <input type="text" name="data_vencimento" id="data_vencimento" class="form-control singleDate" value="{{$hoje}}">
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12">Nenhum pacote cadastrado</div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="{{$id}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    @if(!$pacotes->isEmpty())
                        <button type="submit" class="btn btn-primary">Alterar Pacote</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@elseif(Auth::user()->perfil == 2)
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("meusdados/solicitar-pacote")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Solicitar Plano
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding-top:10px;">
                        <div class="col-md-3">Mensagem</div>
                        <div class="col-md-9">
                            <textarea rows="5" placeholder="Mande sua mensagem com seus dados de contato para selecionar-mos o plano que mais se adequa a sua empresa.(Os dados da empresa precisam estar preenchidos!)" name="mensagem" id="mensagem" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="{{$id}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Solicitar Pacote</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@stop

@section('scripts')
<script type="text/javascript">

function countTags(tag) {
   tagcount = $("span.tag").length;
   $("#tags_tag").removeClass("error");
   if (tagcount > @if($user->pacote && $user->pacote->tags) {{$user->pacote->tags}} @else 20 @endif) {
      $('#tags').removeTag(tag);
      //show a notice to the user and add an error class to the textfield
      $(".notification_inline").remove();
      $("<span class='tag notification_inline error'>Limite de tags estrapolado.</span>")
     .appendTo('#tags_tagsinput')
     .hide()
     .fadeIn(300)
     .delay(1000)
     .fadeOut(300)
     .removeTag();
     $("#tags_tag").addClass("error");
     $("#tags_tagsinput").animate({
    "backgroundColor" : 'rgba(250,0,0,0.8)'
      }, 300)
     .delay(1000).animate({"backgroundColor" : "white"}, 300);
     }
   }

$(document).ready(function()
{

    $("#centro").selectpicker('refresh');

    var tagcount = 0;

    $("#tags").tagsInput({
           'defaultText': "",
            onAddTag: function(tag){
            countTags(tag);
        },
        onRemoveTag: function(){
            tagcount -= $(this).length;
        }
    });

    $("#btn_renovar_pacote").click(function(event)
    {
        event.preventDefault();
        if(confirm("Tem certeza que deseja renovar o pacote?"))
        {
            window.location.href = $(this).attr('href');
        }
    });


    $("#file-simple").fileinput({
            language: "pt-BR",
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-danger",
            fileType: "any",
            @if(isset($user) && $user->company_logotipo)
            initialPreview: [
            "<img src='{{$user->company_logotipo}}' class='file-preview-image' alt='logotipo' title='logotipo'>"
            ],
            @endif
            uploadAsync: false
    });           



});        
</script>
@stop