<!DOCTYPE html>
<html lang="en" class="body-full-height">
	<head>        
        <!-- META SECTION -->
        <title>Ponto da Informação - Informações da Empresa</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- END META SECTION -->
        
        <link rel="stylesheet" type="text/css" href="/front-end/css/styles.css" media="all" />
        <link rel="stylesheet" type="text/css" href="/front-end/css/jquery-ui.css" media="all" />
        <link rel="stylesheet" type="text/css" href="/front-end/css/jcarousel.basic.css" media="all" />
        <style>
        * { margin:0; padding:0; }
        html, body {height:100%;}
        </style>
        <style type="text/css">
        .logo {
            float: left;
            padding: 15px 0px;
            font-size: 1px;
            color: #FFF;
            text-indent: 99999px;
            background: url("../../img/logo.png") left top no-repeat;
            width: 220px;
            height: 61px;
            float: left;
            display: block;
            /*background-size: 100% 100%;
            background-repeat: no-repeat;*/
        }
        .fontDetalhada {
            font-family: 'Brush Script MT', cursive;
            font-size: 38px;
            font-style: oblique;
            font-variant: normal;
            font-weight: 400;
            line-height: 20px;
            float: right;
            color: black;
            padding-right: 1%
        }
        </style>	
    </head>
	<body style="background-color:#FFFFFF; min-height: 100%;">
		<div class="page-content">
			<div class="page-content-holder no-padding">
	            <div class="col-xs-12 push-down-10">
	                <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6">
	                    <a href="{{ URL::to("home/home") }}">
                            <div class="logo" style="width: 440px; height: 130px; text-center"></div>
	                        </a>
	                </div>
	            </div>
	        </div>
	        <div class="page-title" style="color:black;">
                <div class="col-md-12" style="padding-top:25px color:orange;"><h2>{{$usuario->company_name}}</h2></div>
                @if($usuario->company_logotipo)
                    <div class="col-md-12"> 
                        <img src="{{$usuario->company_logotipo}}" class="img-responsive img-text">
                    </div>
                @endif
	        	<div class="col-md-12" ><label>Nome:</label> {{$usuario->company_name}}</div>                
	        	<div class="col-md-12">
                    <label>Endereço:</label> 
                    {{ $usuario->centro->nome or '' }}, {{ $usuario->rua->nome or '' }}
                    {{ isset($usuario->company_numero) ? ', nº ' . $usuario->company_numero : '' }}
                    {{ isset($usuario->company_loja) ? ', lj ' . $usuario->company_loja : '' }}
                    {{ isset($usuario->company_andar) && !empty($usuario->company_andar) ? ', ' . $usuario->company_andar. 'º Andar' : '' }}
                </div>
	        	<div class="col-md-12"><label>E-mail:</label> {{$usuario->company_email}}</div>
	        	<div class="col-md-12"><label>Site:</label> {{$usuario->company_site}}</div>
	        	<div class="col-md-12"><label>Telefone:</label> {{$usuario->company_telefone}}</div>
	        	</div>
	    </div>
	</body>
</html>