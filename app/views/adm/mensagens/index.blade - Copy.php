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

    <div class="page-title">                    
        <h2><span class="fa fa-inbox"></span> Mensagens</h2>
    </div>

    <!-- END CONTENT FRAME TOP -->

        <!-- START JUSTIFIED TABS -->
        <div class="panel panel-default tabs">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#tab8" data-toggle="tab">Recebidas <small>({{$nao_lidas_count}} de {{$mensagens->count()}} não lida(s))</small></a></li>
                <li><a href="#tab9" data-toggle="tab">Enviadas <small>({{$mensagens_enviadas->count()}} mensagens)</small></a></li>
            </ul>
            <div class="panel-body tab-content">
                <div class="tab-pane active" id="tab8">
                    
                    <!-- MENSAGENS RECEBIDAS -->
                    <div class="panel panel-default">
                        <div class="panel-body mail">
                            
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th> De: </th>
                                        <th> Nome Empresa </th>
                                        <th> Titulo da Mensagem </th>
                                        @if(Auth::user()->perfil == 1)
                                        <th> Pacote </th>
                                        <th> Rua </th>
                                        @endif
                                        <th> Data/hora </th>
                                        <th> Ações </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($mensagens as $m)
                                <?php $created_at = new Carbon($m->created_at); ?>
                                    <tr class="@if(!$m->visualizado) warning @endif">
                                        <td> @if(!$m->visualizado) <label class="label label-danger"> Novo! </label> @endif </td>
                                        <td>{{$m->remetente->nome}}</td>
                                        <td>{{$m->remetente->company_name}}</td>
                                        <td>{{$m->titulo}}</td>
                                        @if(Auth::user()->perfil == 1)
                                        <td>{{$m->remetente->pacote->nome or "<label class='label label-warning'> Sem Pacote </label>"}}</td>
                                        <td>{{$m->remetente->rua->nome or "<label class='label label-warning'> Sem Rua </label>"}}</td>
                                        @endif
                                        <td>{{$created_at->toFormattedDateString()}} , Recebido a {{$created_at->diffForHumans(Carbon::now())}}</td>
                                        <td>
                                            @if(Auth::user()->perfil == 1)
                                            <a href="{{URL::to("meusdados/{$m->remetente_id}")}}" class="btn btn-primary"><i class="glyphicon glyphicon-user"></i> Ver Usuário</a>
                                            @endif
                                            <a href="{{URL::to("mensagens/{$m->id}")}}" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i> Visualizar/Responder</a>
                                        </td>
                                    </tr>
                                @empty
                                <tr> 
                                    <td>Nenhuma mensagem recebida.</td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                </tr>
                                    
                                @endforelse   
                                </tbody>
                                
                            </table>                                     
                            
                        </div>
                        <div class="panel-footer"> 
                            {{$mensagens->links()}}
                        </div>                            
                    </div>
                    <!-- MENSAGENS RECEBIDAS END-->


                </div>
                <div class="tab-pane" id="tab9">
                    

                <!-- MENSAGENS ENVIADAS -->
                <div class="panel panel-default">
                    <div class="panel-body mail">
                        
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th> Para: </th>
                                    <th> Nome Empresa </th>
                                    <th> Titulo da Mensagem </th>
                                    @if(Auth::user()->perfil == 1)
                                    <th> Pacote </th>
                                    <th> Rua </th>
                                    @endif
                                    <th> Data/hora </th>
                                    <th> Ações </th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($mensagens_enviadas as $me)
                            <?php $created_at = new Carbon($me->created_at); ?>
                                <tr class="@if(!$me->visualizado) warning @endif">
                                    <td>@if(Auth::user()->perfil == 1) @if(!$me->visualizado) <label class="label label-danger"> Usuário ainda não visualizou </label> @else <label class="label label-success"> Visualizado pelo usuário </label> @endif @endif</td>
                                    <td>{{$me->destinatario->nome}}</td>
                                    <td>{{$me->destinatario->company_name}}</td>
                                    <td>{{$me->titulo}}</td>
                                    @if(Auth::user()->perfil == 1)
                                    <td>{{$m->destinatario->pacote->nome or "<label class='label label-warning'> Sem Pacote </label>"}}</td>
                                    <td>{{$m->destinatario->rua->nome or "<label class='label label-warning'> Sem Rua </label>"}}</td>
                                    @endif
                                    <td>{{$created_at->toFormattedDateString()}} , Enviado a {{$created_at->diffForHumans(Carbon::now())}}</td>
                                    <td><a href="{{URL::to("mensagens/{$me->id}")}}" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i> Visualizar/Responder</a></td>
                                </tr>
                            @empty
                            <tr> 
                                <td>Nenhuma mensagem recebida.</td> 
                                <td></td> 
                                <td></td> 
                                <td></td> 
                            </tr>
                                
                            @endforelse   
                            </tbody>
                            
                        </table>                                     
                        
                    </div>
                    <div class="panel-footer"> 
                        {{$mensagens_enviadas->links()}}
                    </div>                            
                </div>
                <!-- MENSAGENS ENVIADAS END-->


                </div>
                     
            </div>
        </div>                                         
        <!-- END JUSTIFIED TABS -->          
            


</div>
<!-- END PAGE CONTENT WRAPPER --> 
@stop