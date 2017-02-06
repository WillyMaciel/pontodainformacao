<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Ponto da Informação</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="/css/theme-default.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="/css/bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="/front-end/css/styles.css"/>
        <!-- EOF CSS INCLUDE -->
        <style type="text/css">
        .logo {
            height: 61px;
        }
        </style>                            
    </head>
    <body style="background-color:#FFB90F; ">
        <div class="login-container page-container">
            <div class="login-container-box">
                @if (Session::get('success'))
                <?php
                $successes = Session::get('success');
                ?>
                <div class="alert alert-success">
                    <!--<a class="close" data-dismiss="alert">×</a>-->
                    <h4 class="alert-heading"> Sucesso! </h4>
                    <ul>
                        @if(is_array($successes))
                            @foreach($successes as $sucesso)
                                <li>{{$sucesso}}</li>
                            @endforeach
                        @else
                            <li>{{$successes}}</li>
                        @endif
                    </ul>
                </div>
                @endif
                @if (Session::get('info'))
                <?php
                $infos = Session::get('info');
                ?>
                <div class="alert alert-info">
                    <!--<a class="close" data-dismiss="alert">×</a>-->
                    <h4 class="alert-heading"> Informações: </h4>
                    <ul>
                        @if(is_array($infos))
                            @foreach($infos as $info)
                                <li>{{$info}}</li>
                            @endforeach
                        @else
                            <li>{{$infos}}</li>
                        @endif
                    </ul>
                </div>
                @endif
                @if (Session::get('warning'))
                <?php
                $warnings = Session::get('warning');
                ?>
                <div class="alert alert-warning">
                    <!--<a class="close" data-dismiss="alert">×</a>-->
                    <h4 class="alert-heading"> Atenção! </h4>
                    <ul>
                        @if(is_array($warnings))
                            @foreach($warnings as $warning)
                                <li>{{$warning}}</li>
                            @endforeach
                        @else
                            <li>{{$warnings}}</li>
                        @endif
                    </ul>
                </div>
                @endif
                @if (Session::get('danger'))
                <?php
                $dangers = Session::get('danger');
                ?>
                <div class="alert alert-danger">
                    <!--<a class="close" data-dismiss="alert">×</a>-->
                    <h4 class="alert-heading"> Os seguintes erros foram encontrados: </h4>
                    <ul>
                        @if(is_array($dangers))
                            @foreach($dangers as $danger)
                                @if (is_array($danger))
                                    @foreach ($danger as $msg)              
                                        <li>{{$msg}}</li>
                                    @endforeach
                                @else
                                    <li>{{$danger}}</li>
                                @endif
                            @endforeach
                        @else
                            <li>{{$dangers}}</li>
                        @endif
                    </ul>
                </div>
                @endif
                <div class="row" style="margin-bottom: 20px!important;">
                    <a href="{{URL::to("home/home")}}">
                        <div class="col-md-12 logo-header" style="font-size: 1px; color: #FFF; background: url('../img/logo.png') left center no-repeat; left: 15%; width: 100%; height: 130px; text-align:center; float: left; display: block;"></div>
                    </a>
                </div>
                @section('content')

                @show
                <div class="login-container-box-footer">
                     <div class="pull-left btn" style="padding-left: 0; cursor: default;">
                        </div>
                    <!-- <div class="pull-right">
                        <a class="btn btn-link" href="{{URL::to("home/quem-somos")}}">Sobre a empresa</a> |
                        <a class="btn btn-link" href="{{URL::to("home/termos-uso")}}">Termos de uso</a> |
                        <a class="btn btn-link" href="{{URL::to("home/fale-conosco")}}">Contato</a>
                    </div> -->
                </div>
            </div>
            <div class="page-footer" style="border:0px; bottom: 0;">
                
                <!-- page footer wrap -->
                <div class="page-footer-wrap bg-dark-gray">
                    <!-- page footer holder -->
                    <!--  -->
                    <!-- ./page footer holder -->
                </div>
                <!-- ./page footer wrap -->
                
                <!-- page footer wrap -->
                <div class="page-footer-wrap bg-darken-gray" style="background-color:#ff9900">
                    <!-- page footer holder -->
                    <div class="page-footer-holder">
                        <div class="social-links" style="width: 100%!important;">
                            <a style="width: auto!important; padding: 0 10px 0 10px; color: white;font-size:12px;" href="{{URL::to("home/home")}}">Página Inicial</a>
                            <a style="width: auto!important; padding: 0 10px 0 10px; color: white;font-size:12px;" href="{{URL::to("id/sign-in")}}">Anuncie seu estabelecimento</a>
                            <a style="width: auto!important; padding: 0 10px 0 10px; color: white;font-size:12px;" href="{{URL::to("home/quem-somos")}}">Quem Somos</a>
                            <a style="width: auto!important; padding: 0 10px 0 10px; color: white;font-size:12px;" href="{{URL::to("home/termos-uso")}}">Termos de Uso e Política de Privacidade</a>
                            <a style="width: auto!important; padding: 0 10px 0 10px; color: white;font-size:12px;" href="{{URL::to("home/fale-conosco")}}">Fale Conosco</a>
                            <a style="width: auto!important; padding: 0 10px 0 10px; color: white;font-size:10px;" href="http://www.americamktdesign.com/">Copyright &copy; 2016 por America Marketing e Design</a>
                        </div>
                    <!-- ./page footer holder -->
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/plugins/bootstrap/bootstrap.min.js"></script> 
<script type="text/javascript" src="/js/maskedinput.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
    $(".telefone").mask("(99) 9999-9999?9");
});
</script>