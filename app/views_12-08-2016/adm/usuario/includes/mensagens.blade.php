<!-- MESSAGES -->
<li class="xn-icon-button pull-left">
    <a href="#"><span class="fa fa-comments"></span></a>
    <div class="informer informer-danger">{{$novas_count}}</div>
    <div class="panel panel-primary animated zoomIn xn-drop-right xn-panel-dragging">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="fa fa-comments"></span> Mensagens Suporte</h3>                                
            <div class="pull-right">
                <span class="label label-danger">{{$novas_count}} Não Visualizada(s)</span>                
            </div>
        </div>
        <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
            @foreach($mensagens as $m)

            <?php $created_at = new Carbon($m->created_at); ?>

            <a href="{{URL::to('mensagens/' . $m->id)}}" class="list-group-item">
                <span class="contacts-title">{{$m->remetente->nome or 'SEM NOME'}} - {{$m->remetente->company_name or 'SEM NOME DA EMPRESA'}}</span>
                @if($m->visualizado == 0)
                    <span class="label label-danger pull-right" id="count_usuariosRecentes2">Novo!</span>
                @else
                    <span class="label label-info pull-right" id="count_usuariosRecentes2">Visualizado</span>
                @endif
                <br />
                <span class="label label-info pull-right" id="count_usuariosRecentes2">Recebido a {{$created_at->diffForHumans(Carbon::now())}}</span>
                <p>{{substr($m->titulo, 0, 50)}} ...</p>
            </a>

            @endforeach            
        </div>     
        <div class="panel-footer text-center">
            <a href="{{URL::to('mensagens/create')}}" class="btn btn-danger pull-left"><span class="fa fa-envelope"></span> Nova Mensagem</a>
            <a href="{{URL::to('mensagens/')}}" class="btn btn-danger pull-right"><span class="fa fa-envelope"></span> Ver Mensagens</a>
        </div>                            
    </div>                        
</li>
<!-- END MESSAGES -->