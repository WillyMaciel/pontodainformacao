<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Ponto da Informação</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="/css/bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="/css/theme-default.css"/>
        
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container"  style="background-color:#FFB90F;">
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation" style="background-color:#FFB90F;">
                    <li class="xn-logo" style="background-color:#e34724;"><a href="{{URL::to("/")}}" style="background-color:#FFB90F;height:61px;">Ponto da Informação</a></li>
                    <li class="xn-title" style="color:white;border-color:#FFB90F;">Menu</li>
                    @if(Auth::User()->perfil == 1)
                        @if($menu == 1)
                            <li><a href="{{URL::to("/")}}" style="border:0px;"><span class="fa fa-desktop"></span> <span class="xn-text">Página Inicial</span></a></li>
                            <li><a href="{{URL::to("centro")}}" style="color:white;border:0px;"><span class="fa fa-road"></span> Centros</a></li>
                            <li><a href="{{URL::to("parametros")}}" style="color:white;border:0px;"><span class="fa fa-gears"></span> Parametros</a></li>
                            <li><a href="{{URL::to("meusdados/novo")}}" style="color:white;border:0px;"><span class="fa fa-plus-circle"></span> Cadastrar Loja</a></li>
                        @elseif($menu == 2)
                        <li class="xn-title"></li>
                        @if(count($centro) > 0)
                        <li><a class="active" href="javascript:void(0)" style="border:0px; background-color: #333;"> <span class="xn-text">{{$centro->nome}}</span></a></li>
                        <li><a href="{{URL::to("usuario/solicitacao-cliente")}}/{{{$centro->id}}}" style="color:white;border:0px;"><span class="fa fa-user"></span> Solicitação de clientes</a></li>
                        <li><a href="{{URL::to("usuario/index")}}/{{{$centro->id}}}" style="color:white;border:0px;"><span class="fa fa-group"></span> Clientes</a></li>
                        <li><a href="{{URL::to("centro/cadastro-geral")}}/{{{$centro->id}}}" style="color:white;border:0px;"><span class="fa fa-bars"></span> Cadastro Geral</a></li>
                        @endif
                        <li><a href="{{URL::to("/")}}" style="border:0px;"><span class="fa fa-desktop"></span> <span class="xn-text">Página Inicial</span></a></li>
                        <li><a href="{{URL::to("centro")}}" style="color:white;border:0px;"><span class="fa fa-road"></span> Centros</a></li>
                        <li><a href="{{URL::to("parametros")}}" style="color:white;border:0px;"><span class="fa fa-gears"></span> Parametros</a></li>
                        <li><a href="{{URL::to("meusdados/novo")}}" style="color:white;border:0px;"><span class="fa fa-plus-circle"></span> Cadastrar Loja</a></li>
                        @elseif($menu == 3)
                        <li class="xn-title"></li>
                        <li><a class="active" href="javascript:void(0)" style="border:0px; background-color: #333;"> <span class="xn-text">{{$centro->nome}}</span></a></li>
                        <li><a href="{{URL::to("usuario/index")}}/{{{$centro->id}}}" style="color:white;border:0px;"><span class="fa fa-group"></span> Clientes</a></li>
                        <li><a href="{{URL::to("parametros")}}" style="color:white;border:0px;"><span class="fa fa-gears"></span> Parametros</a></li>
                        <li><a href="{{URL::to("meusdados/novo")}}" style="color:white;border:0px;"><span class="fa fa-plus-circle"></span> Cadastrar Loja</a></li>
                        @endif
                    @else
                    <li><a href="{{URL::to("/")}}" style="border:0px;"><span class="fa fa-desktop"></span> <span class="xn-text">Página Inicial</span></a></li>
                    <li><a href="{{URL::to("categorias/solicitar-categoria")}}" style="color:white;border:0px;"><span class="fa fa-user"></span> Solicitar Categoria</a></li>
                    @endif
                    <li><a href="{{URL::to("id/sign-out")}}"><span class="fa fa-sign-out"></span> <span class="xn-text">Logout</span></a></li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel" style="background-color:#FFB90F">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="{{URL::to("id/sign-out")}}" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 

                    @if(Auth::User()->perfil == 1)
                    <!-- Alertas -->
                    <li class="xn-icon-button pull-left">
                        <a href="#"><span class="fa fa-bell-o"></span></a>
                        <?php $arrAlerts = Session::get('arrAlerta'); ?>
                        <?php //echo '<pre>'; print_r($arrAlerts); echo '</pre>'; exit; ?>
                        <div class="informer informer-danger">{{ $arrAlerts['total'] }}</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-right xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-bell-o"></span> Alertas do sistema</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger">{{ $arrAlerts['total'] }} alerta(s)</span>
                                </div>
                            </div>
                            <?php unset($arrAlerts['total']); ?>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                @foreach($arrAlerts['s'] as $key => $alerta)
                                    <a href="{{URL::to("usuario/solicitacao-cliente/$key")}}" class="list-group-item">
                                        <div class="list-group-status status-online"></div>
                                        <span class="contacts-title">{{$alerta['centro_nome']}}</span>
                                        <p>Você tem {{$alerta['contador']}} solicitação(ões) nova(s) </p>
                                    </a>
                                @endforeach
                                @foreach($arrAlerts['c'] as $key => $alerta)
                                    <a href="{{URL::to("meusdados/$key")}}" class="list-group-item">
                                        <div class="list-group-status status-online"></div>
                                        <span class="contacts-title">{{$alerta['nome']}}</span>
                                        <p>Você tem {{$alerta['contador']}} cliente(s) novo(s) </p>
                                    </a>
                                @endforeach
                            </div>     
                            <div class="panel-footer text-center">
                                Alertas do Sistema
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- NOVOS USUÁRIOS -->

                    <?php 
                        $users = UsuarioController::getUsuariosRecentes();
                        $users_count = UsuarioController::getUsuariosNovosCount();
                     ?>

                    <li class="xn-icon-button pull-left">
                        <a href="#" id="novos_usuariosRecentes"><span class="fa fa-user"></span></a>
                        <div class="informer informer-danger" id="count_usuariosRecentes1">{{$users_count}}</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-right xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-users"></span> Últimos Usuários Cadastrados</h3>
                                <div class="pull-right">
                                    <span class="label label-danger" id="count_usuariosRecentes2">{{$users_count}} Não Visualizado(s)</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" id="lista_usuariosRecentes" style="height: 200px;">
                                @foreach($users as $user)
                                <a href="{{URL::to('/meusdados/' . $user->id)}}" class="list-group-item" >

                                    <?php $created_at = new Carbon($user->created_at); ?>

                                    @if(date('Y-m-d', strtotime("-5 days",strtotime($user->data_vencimento))) >= date( "Y-m-d" ) && $user->status == 1)
                                        <span class="text-success fa fa-circle"></span>
                                    @elseif($user->data_vencimento > date( "Y-m-d H:i:s" ) && $user->status == 1)
                                        <span class="text-warning fa fa-circle"></span>
                                    @else
                                        <span class="text-danger fa fa-circle"></span>
                                    @endif                                    

                                    <span class="contacts-title">{{$user->nome}}</span> 
                                    @if($user->visualizado == 0)
                                        <span class="label label-danger pull-right" id="count_usuariosRecentes2">Novo!</span>
                                    @else
                                        <span class="label label-info pull-right" id="count_usuariosRecentes2">Visualizado</span>
                                    @endif

                                    <br />
                                    <span class="label label-info pull-right" id="count_usuariosRecentes2">Registrado a {{$created_at->diffForHumans(Carbon::now())}}</span>

                                    <p>{{Formatter::getDataHoraFormatada($user->created_at)}}</p>
                                </a>
                                @endforeach
                            </div>     
                            <!-- <div class="panel-footer text-center">
                                <a href="pages-messages.html">Show all messages</a>
                            </div>  -->                           
                        </div>                        
                    </li>
                    <!-- END NOVOS USUÁRIOS -->                    

                    <!-- MENSAGENS PARA ADMININSTRADORES -->
                    @include('adm.includes.mensagens')
                    <!-- MENSAGENS PARA ADMININSTRADORES END -->
                    @elseif(Auth::user()->perfil == 2)
                        <!-- MENSAGENS PARA USUARÍOS COMUNS -->
                        @include('adm.usuario.includes.mensagens')
                        <!-- MENSAGENS PARA USUARÍOS COMUNS END -->
                    @endif

                    <!-- END TOGGLE NAVIGATION -->                    
                </ul>
                @if (Session::get('success'))
                    <?php
                    $successes = Session::get('success');
                    ?>
                    <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <h4 class="alert-heading"> Sucesso! </h4>
                        <ul>
                            @foreach($successes as $sucesso)
                                <li>{{$sucesso}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (Session::get('info'))
                    <?php
                    $infos = Session::get('info');
                    ?>
                    <div class="alert alert-info">
                        <a class="close" data-dismiss="alert">×</a>
                        <h4 class="alert-heading"> Informações: </h4>
                        <ul>
                            @foreach($infos as $info)
                                <li>{{$info}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (Session::get('warning'))
                    <?php
                    $warnings = Session::get('warning');
                    ?>
                    <div class="alert alert-warning">
                        <a class="close" data-dismiss="alert">×</a>
                        <h4 class="alert-heading"> Atenção! </h4>
                        <ul>
                            @foreach($warnings as $warning)
                                <li>{{$warning}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (Session::get('danger'))
                    <?php
                    $dangers = Session::get('danger');
                    ?>
                    <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert">×</a>
                        <h4 class="alert-heading"> Os seguintes erros foram encontrados: </h4>
                        <ul>
                            @foreach($dangers as $danger)
                                @if (is_array($danger))
                                    
                                        @foreach ($danger as $msg)              
                                            <li>{{$msg}}</li>
                                        @endforeach
                                    
                                @else
                                    <li>{{$danger}}</li>
                                @endif
                                
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- END X-NAVIGATION VERTICAL -->                
                @section('content')

                @show
                             
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Tem certeza que você deseja deslogar do sistema?</p>                    
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{URL::to("id/sign-out")}}" class="btn btn-success btn-lg">Sim</a>
                            <button class="btn btn-default btn-lg mb-control-close">Não</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/plugins/bootstrap/bootstrap.min.js"></script> 
        


        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type="text/javascript" src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <script type='text/javascript' src='/js/plugins/icheck/icheck.min.js'></script>       
        <script type="text/javascript" src="/js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>        
        <script type="text/javascript" src="/js/plugins/jquery-validation/jquery.validate.js"></script>
        <script type="text/javascript" src="/js/plugins/fileinput/fileinput.min.js"></script>
        <script type="text/javascript" src="/js/locales/pt-BR.js"></script> 
        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="/js/plugins.js"></script>        
        <script type="text/javascript" src="/js/actions.js"></script>        

        <!-- Include Jquery -->
        <script type="text/javascript" src="/js/plugins/summernote/summernote.js"></script>
        <script type="text/javascript" src="/js/jquery.maskMoney.js"></script>
        <script type="text/javascript" src="/js/maskedinput.min.js"></script> 
        <script type="text/javascript" src="/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="/js/plugins/daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.numbersOnly').keyup(function () { 
                    this.value = this.value.replace(/[^0-9\.]/g,'');
                });
                $(".money").maskMoney({symbol:'R$ ', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
                $("#cpf").mask("999.999.999-99");
                $(".telefone").mask("(99) 9999-9999");
                $(".celular").mask("(99) 9999-9999?9");

                $('#centro').selectpicker('refresh');
                $('#centro').change(function(){
                    refreshInputSelectRuas();
                });

                function refreshInputSelectRuas()
                {
                    var centro_id = $('#centro').val();
                    if(centro_id > 0){
                        $.ajax({
                            url: "/centro/option-ruas/"+centro_id,
                            // data: { prova_id : provaId, tipo : "m" },
                            cache: false,
                            success: function(html){
                                $('#rua').html(html);
                                $('#rua').selectpicker('refresh');
                            }
                        });
                    }
                }

                var d = new Date();
                $('.singleDate').daterangepicker({
                    "singleDatePicker": true,
                    "autoApply": true,
                    "startDate": d.getDate()+"/"+(d.getMonth()+1)+"/"+d.getFullYear()
                }, function(start, end, label) {
                  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
                });

                $("body").on('click','.add-category',function(){

                    $("#id_categoria").val($(this).data('id'));
                });

                $("body").on('click','.ver-imagem',function(){
                    console.log($(this).data('id'));
                    $("#modal-image").html(
                        $('<img>', {src: '/'+$(this).data('caminho')})
                    );
                    $('#deletar-imagem').prop('href','{{URL::to("categorias/delete-upload")}}'+'/'+$(this).data('id'));
                });
                $("body").on('click','.deleteAttribute',function(){
                    if (confirm("Você tem certeza que quer deletar "+$(this).data("string")+"?")) {
                        var url = $(this).data("action");
                        var id = $(this).data("id");
                        var centro = $(this).data("centro");
                        // alert(url+"/"+id);
                        window.location.href = url+"/"+id+"/"+centro;
                    }
                    return false;
                });
                $("#pacote").change(function(){
                    var data = $(this).find(':selected').data("formatter");
                    $("#data_vencimento").val(data);
                })
            });
        </script>
        <!-- END TEMPLATE -->

        @yield('scripts')

        <!-- Funcionalidade do botão de Novos Usuários -->
        <script type="text/javascript">

            $(document).ready(function()
            {
            //     $.ajax(
            //     {
            //         url: "/usuario/usuarios-recentes",
            //         // data: { prova_id : provaId, tipo : "m" },
            //         cache: false,
            //         success: function(users)
            //         {   
            //             console.log(users);
            //             var html;
            //             html = '';
            //             for (var i = 0 ; i <= users.length; i++) 
            //             {
            //                 console.log(users[i]);
            //                 html = '';
            //                 html += '<a href="#" class="list-group-item">';
            //                 html +=    '<div class="list-group-status status-online"></div>';
            //                 html +=    '<span class="contacts-title">'+users[i].nome+'</span>';
            //                 html +=    '<p>Praesent placerat tellus id augue condimentum</p>';
            //                 html += '</a>';

            //                 $('#lista_usuariosRecentes').append(html);
            //             }
                        
                         
            //         }
            //     });

            //     $.ajax(
            //     {
            //         url: "/usuario/usuarios-novos-count",
            //         // data: { prova_id : provaId, tipo : "m" },
            //         cache: false,
            //         success: function(count)
            //         {                                       
            //             $('#count_usuariosRecentes1').html(count);
            //             $('#count_usuariosRecentes2').html(count);                         
            //         }
            //     });


                $('#novos_usuariosRecentes').click(function()
                {
                    // $.ajax(
                    // {
                    //     url: "/usuario/usuarios-recentes-reset",
                    // });
                });
            });
            
        </script>

    <!-- END SCRIPTS -->         
    </body>
</html>