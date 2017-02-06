<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <!-- START CONTENT FRAME -->
    <div class="content-frame">

        <!-- START CONTENT FRAME BODY -->
        <div class="" style="margin-left: 0px;">
            <form action="{{URL::to('mensagens')}}" method="POST">
                <input type="hidden" name="titulo" value="RE: {{$msg->titulo}}">
                <input type="hidden" name="destinatario_id" value="{{$msg->remetente_id}}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">De: {{$msg->remetente->nome}} <small>{{$msg->remetente->company_name}}</small> -> Para: {{$msg->destinatario->nome}} <small>{{$msg->destinatario->company_name}}</small></h3>
                        </div>
                    </div>
                    <div class="panel-body">
                        <h3>{{$msg->titulo}}<small class="pull-right text-muted"><span class="fa fa-clock-o"></span> {{$msg->created_formatado}}</small></h3>
                        {{$msg->mensagem}}    
                        
                        @if($msg->remetente_id != Auth::user()->id)
                        <div class="form-group push-up-20">
                            <label>Responder</label>
                            <textarea name="mensagem" class="form-control summernote_lite" rows="3" placeholder="Clique para abrir o Editor"></textarea>
                        </div>
                        @else
                            <hr />
                            <p> Você não pode responder uma mensagem enviada por você mesmo </p>
                        @endif
                    </div>
                    <div class="panel-footer">
                    @if($msg->remetente_id != Auth::user()->id)
                        <button type="submit" class="btn btn-success pull-right"><span class="fa fa-mail-reply"></span> Responder</button>
                    @endif
                    </div>
                </div>
            </form>
        </div>
        <!-- END CONTENT FRAME BODY -->
    </div>
    <!-- END CONTENT FRAME -->
            
            


</div>
<!-- END PAGE CONTENT WRAPPER --> 