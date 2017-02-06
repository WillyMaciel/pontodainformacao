@extends('template.index')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb push-down-0">
    <li><a href="{{URL::to('meusdados')}}">Painel de Controle</a></li>
    <li class="active">Mensagens</li>
</ul>
<!-- END BREADCRUMB -->  

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <!-- START CONTENT FRAME -->
    <div class="content-frame">                                    
        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">                        
            <div class="page-title">                    
                <h2><span class="fa fa-file-text"></span>Nova Mensagem</h2>
            </div>

            <div class="pull-right">                                                                                    
                <a href="{{URL::to('mensagens')}}" class="btn btn-default"><span class="fa fa-arrow-left"></span> Voltar</a>
            </div>
        </div>
        <!-- END CONTENT FRAME TOP -->        
       
        <!-- START CONTENT FRAME BODY -->
        <div class="content-frame-body" style="margin-left: 0px;">
            <form action="{{URL::to('mensagens')}}" method="POST">                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">Mensagem para Suporte <small>Ponto da Informação</small></h3>
                        </div>
                    </div>
                    <div class="panel-body">

                        <div class="form-group push-up-20">
                            <label>Titulo</label>
                            <input class="form-control" type="text" name="titulo" value=""> 
                        </div>
                        
                        <div class="form-group push-up-20">
                            <label>Mensagem</label>
                            <textarea name="mensagem" class="form-control summernote_lite" rows="3" placeholder="Clique para abrir o Editor"></textarea>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-success pull-right"><span class="fa fa-mail-reply"></span> Responder</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- END CONTENT FRAME BODY -->
    </div>
    <!-- END CONTENT FRAME -->
            
            


</div>
<!-- END PAGE CONTENT WRAPPER --> 
@stop