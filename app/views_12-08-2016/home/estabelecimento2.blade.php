<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>Ponto da Informação - Página Inicial</title>
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
            @if(file_exists("../../img/logo.png"))
                background: url("../../img/logo3.png")  top center no-repeat;
            @else
                background: url("../../../img/logo3.png") top center no-repeat;
            @endif
            width: 100%;
            height: 100px;
            float: left;
            display: block;
            /*background-size: 100% 100%;
            background-repeat: no-repeat;*/
        }
        .fontDetalhada {
            font-family: 'Brush Script MT', cursive;
            font-size: 25px;
            font-style: normal;
            font-variant: normal;
            font-weight: bold;
            line-height: 20px;
            float: right;
            color: black;
            padding-right: 1%
        }
        </style>
    </head>
    <body style="background-color:#FFB90F; height:100%; min-height: 100%;">
        <!-- page container -->
        <div class="page-container" style="background-color:#FFB90F; min-height: 100%; position:relative;">
            <!-- page header -->
            <div class="page-header" style="background-color:#FFB90F; position:relative; left:100px">
                
                <!-- page header holder -->
                <div class="page-header-holder" >
                    
                    <!-- page logo -->
                    <!-- <div class="logo">
                        <a href="{-- URL::to("home/home") --}">Ponto da Informação</a>
                    </div> -->
                    <!-- ./page logo -->

                    <!-- nav mobile bars -->
                    <div class="navigation-toggle">
                        <div class="navigation-toggle-button"><span class="fa fa-bars"></span></div>
                    </div>
                    <!-- ./nav mobile bars -->
                    
                    <!-- navigation -->
                    <ul class="navigation">
                       <li>
                            <a href="{{URL::to("id/sign-up")}}">
                                <span style="color:white;" class="visible-lg text-info">
                                    <span style="background-color: black;color: white;">&nbsp;&nbsp;<span style="color: #FFB90F">Sou lojista,</span> QUERO me cadastrar&nbsp;&nbsp;</span>
                                </span>
                                <span class="visible-md visible-sm visible-xs">Sou lojista QUERO me cadastrar!</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{URL::to("id/sign-in")}}">
                                <span style="color:white;" class="visible-lg text-info">
                                <span style="background-color: black;color: white;">&nbsp;&nbsp;<span style="color: #FFB90F">Login&nbsp;&nbsp;</span>
                                <span class="visible-md visible-sm visible-xs">login</span>
                            </a>
                        </li>
                    </ul>
                    <!-- ./navigation -->                        

                    
                </div>
                <!-- ./page header holder -->
                
            </div>
            <!-- ./page header -->
            
            <!-- page content -->
            <div class="page-content">
                @if(isset($id))
                    <!-- page content wrapper -->
                    <div class="page-content-wrap bg-light" style="background-color:#FFB90F; border:0px;">
                        <!-- page content holder -->
                            <div class="page-content-holder padding:v.12">
                            <div class="col-xs-12 push-down-10">
                                <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6">
                                    <a href="{{ URL::to("home/home") }}">
                                        <div class="logo"></div>
                                        <br/><br/><br/><br/>
                                        <span class="fontDetalhada" style="font-size: 40px; position:relative; top: -10px">{{$centro->nome}}</span>
                                        </div>
                                    </a>
                                    </div>
                            </div>
                            <!-- page title -->
                            <div class="page-title">
                                <div class="col-md-2"></div>
                                <form action="" method="get" id="form-search">
                                    <div class="col-lg-offset-1 col-lg-6 col-md-offset-4 col-md-12" style="left:50px; top:-20px;">
                                        <div class="input-group">
                                            <input type="text" autocomplete="off" name="search" id="search" class="form-control" value="{{Input::get('search')}}" placeholder="O que você está procurando?" />
                                            <span class="input-group-addon" style="cursor:pointer; border: none; background-color: #FFB90F;" id="span-search">
                                                <!-- <span class="fa fa-search"></span> -->
                                                <img @if(file_exists("../../img/ok.png"))  src="../../img/ok.png" @else src="../../../img/ok.png" @endif style="margin-top: -20px; margin-left: -20px; position: relative; width: 68px; z-index: 10;">
                                            </span>
                                        </div>
                                </form>
                            </div>
                            <!-- ./page title -->
                        </div>
                        <!-- ./page content holder -->
                    </div>
                @endif
                <!-- ./page content wrapper -->
                <!-- page content wrapper -->
                <div class="page-content-wrap" style="background-color:#FFB90F; border: 0px;">                    
                    <!-- page content holder -->
                    <div class="page-content-holder padding-v-30">
                        <?php 
                        $count=5;
                        $auxRua='';
                        ?>
                        <div class="col-xs-12 push-down-20">
                            @if(isset($categorias) && !$categorias->isEmpty())
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <div class="panel panel-warning" style="background: #FFB90F;border:0px; position:absolute; top:-350px; right:120px">
                                        <div class="panel-heading text-center" style="background: #FFB90F; color: white; border:0px"><strong style="font-size: 15px;">CATEGORIAS</strong></div>
                                        <div class="panel-body" style="max-height: 500px; overflow-y: Auto;width: 100%; background:#b4d35c; font color: white; border: 5px solid #d9950e; border-left: 5px solid #d9950e; border-right: 5px solid #d9950e; border-bottom: 5px solid #d9950e; padding: 5px 0;">
                                            @if(isset($categorias) && !$categorias->isEmpty())
                                                @foreach($categorias as $categoria)
                                                    <div class="col-xs-12 padding-v-1">
                                                        <a class="col-xs-12 btn btn-sm {{{ count($categorySel) > 0 && $categoria->id == $categorySel->id ? 'btn-success' : '' }}}" href="{{URL::to("home/estabelecimento")}}/{{$id}}/{{$categoria->id}}"><strong style="font-size: 13px; text-align=Left; color: white">{{$categoria->nome}}</strong></a>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="push-down-10" style="clear: both;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    @if(isset($estabelecimentos) && !$estabelecimentos->isEmpty())

                                        <div class="col-lg-12 padding-v-5">
                                            <div class="panel panel-warning">
                                                
                                                <div class="panel-heading text-center">
                                                    @if(count($categorySel) > 0)
                                                    <strong style="font-size: 16x;">{{$categorySel->nome}}</strong>
                                                    @endif
                                                    <button class="btn btn-default pull-right" id="btn-print"><i class="fa fa-print"></i> Imprimir</button>
                                                    <div style="clear: both;"></div>
                                                </div>
                                                <div class="panel-body" id="div-print">
                                                    <div style="margin: 0 auto; width: 70%">
                                                        <div class="col-md-4 col-xs-12 text-center hidden-print">
                                                            <img style="width: 150px; height: 150px;" src="/{{ (!empty($imagem)) ? $imagem->caminho_completo : 'uploads/categorias/sem_foto.gif' }}">
                                                        </div>
                                                        <div class="col-xs-12 text-center visible-print-block">
                                                            <legend>www.pontodainformacao.com.br</legend><br><br>
                                                        </div>
                                                        <div class="col-md-8 col-xs-12">
                                                            @if(INPUT::has('search'))
                                                                <h3>"{{INPUT::get('search')}}"</h3>
                                                            @endif
                                                        </div>
                                                        @if(!$estabelecimentos->isEmpty())
                                                            @if(isset($topEstabelecimentos) && !$topEstabelecimentos->isEmpty())
                                                                <div class="col-md-8 col-xs-12 hidden-print" style="border: 1px; border: #FFB90F 5px solid;border-radius: 10px; padding:10px;">
                                                                    @foreach($topEstabelecimentos as $topEstabelecimento)
                                                                        <a href="{{URL::to("usuario/dados-company/$topEstabelecimento->id")}}"  onclick="window.open('{{URL::to("usuario/dados-company/$topEstabelecimento->id")}}', 'newwindow', 'width=500, height=500'); return false;"> {{$topEstabelecimento->company_name}}</a> <br/>
                                                                        <font color="black"><strong>{{ $topEstabelecimento->rua }}
                                                                        {{ isset($topEstabelecimento->company_numero) ? ', nº ' . $topEstabelecimento->company_numero : '' }}
                                                                        {{ isset($topEstabelecimento->company_loja) ? ', lj ' . $topEstabelecimento->company_loja : '' }}
                                                                        {{ isset($topEstabelecimento->company_andar) && !empty($topEstabelecimento->company_andar) ? ', ' . $topEstabelecimento->company_andar. 'º Andar' : '' }}</strong></font>  <br/>
                                                                    @endforeach
                                                                </div>
                                                                <div class="col-md-8 col-xs-12 visible-print-block">
                                                                    @foreach($topEstabelecimentos as $topEstabelecimento)
                                                                        <a href="{{URL::to("usuario/dados-company/$topEstabelecimento->id")}}"  onclick="window.open('{{URL::to("usuario/dados-company/$topEstabelecimento->id")}}', 'newwindow', 'width=500, height=500'); return false;"> {{$topEstabelecimento->company_name}}</a> <br/>
                                                                        <font color="black"><strong>{{ $topEstabelecimento->rua }}
                                                                        {{ isset($topEstabelecimento->company_numero) ? ', nº ' . $topEstabelecimento->company_numero : '' }}
                                                                        {{ isset($topEstabelecimento->company_loja) ? ', lj ' . $topEstabelecimento->company_loja : '' }}
                                                                        {{ isset($topEstabelecimento->company_andar) && !empty($topEstabelecimento->company_andar) ? ', ' . $topEstabelecimento->company_andar. 'º Andar' : '' }}</strong></font>  <br/>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                            <div class="col-md-8 col-xs-12">
                                                                @foreach($estabelecimentos as $estabelecimento) <?php $count++; ?>
                                                                    @if($estabelecimento->rua != $auxRua)
                                                                        <legend class="push-up-20 push-down-0" >{{ $estabelecimento->rua }}</legend>
                                                                        <?php $auxRua = $estabelecimento->rua ?>
                                                                    @endif
                                                                    <div class="col-xs-12 push-up-10 {{($count % 2 == 0) ? 'bg-warning' : ''}}">
                                                                        <p><strong><a href="{{URL::to("usuario/dados-company/$estabelecimento->id")}}"  onclick="window.open('{{URL::to("usuario/dados-company/$estabelecimento->id")}}', 'newwindow', 'width=500, height=500'); return false;"> {{$estabelecimento->company_name}}</a></strong></p>
                                                                        <p style="color: #000;"><strong>
                                                                            {{ $estabelecimento->rua }}
                                                                            {{ isset($estabelecimento->company_numero) ? ', nº ' . $estabelecimento->company_numero : '' }}
                                                                            {{ isset($estabelecimento->company_loja) ? ', lj ' . $estabelecimento->company_loja : '' }}
                                                                            {{ isset($estabelecimento->company_andar) && !empty($estabelecimento->company_andar) ? ', ' . $estabelecimento->company_andar. 'º Andar' : '' }}
                                                                        </strong></p>
                                                                        <hr style="margin: 0;">
                                                                    </div>
                                                                @endforeach
                                                                <div style="clear: both;"></div>
                                                            </div>
                                                        @else
                                                        <div class="alert alert-warning teste-center">Nenhum estabelecimento encontrado para esses filtros!</div>
                                                        @endif
                                                        <div style="clear: both;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    <!-- <div class="alert alert-warning teste-center">Nenhum estabelecimento encontrado para esses filtros!</div> -->
                                    @endif
                                </div>
                            @else
                            <div class="alert alert-warning">Nenhuma categoria cadastrada neste local!</div>
                            @endif
                        </div>  
                        <!-- ./page content -->
                        
                    </div>

                </div>
            </div>
            <!-- page footer -->
            <div class="page-footer visible-lg" style="border:0px; position: absolute; bottom: 0;">
                
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
                        <!-- copyright -->
                        <!-- <div class="copyright">
                            &copy; 2015 Ponto da Informação - All Rights Reserved
                        </div> -->
                        <!-- ./copyright -->
                        
                        <!-- social links -->
                        <!-- <div class="social-links">
                            <a href="#"><span class="fa fa-facebook"></span></a>
                            <a href="#"><span class="fa fa-twitter"></span></a>
                            <a href="#"><span class="fa fa-google-plus"></span></a>
                        </div> -->                        
                        <!-- ./social links -->
                        
                    </div>
                    <!-- ./page footer holder -->
                </div>
                <!-- ./page footer wrap -->
                
            </div>
            <!-- ./page footer -->
        </div>        
        <!-- ./page container -->
        
        <!-- page scripts -->
        <script type="text/javascript" src="/front-end/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/front-end/js/plugins/jquery/jquery-ui.js"></script>
        <script type="text/javascript" src="/front-end/js/plugins/bootstrap/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="/front-end/js/plugins/mixitup/jquery.mixitup.js"></script>
        <script type="text/javascript" src="/front-end/js/plugins/appear/jquery.appear.js"></script>
        
        <script type="text/javascript" src="/front-end/js/actions.js"></script>
        <script type="text/javascript" src="/front-end/js/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="/front-end/js/carousel.js"></script>
        <script type="text/javascript" src="/front-end/js/jquery.printElement.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#span-search").click(function(){
                    $("#form-search").submit();
                });

                $("body").on('click', '#btn-print', function(){
                    console.log("$this");
                    $("#div-print").printElement();
                });

                $("#search").autocomplete({
                  source: function( request, response ) {
                    $.ajax({
                      url: '{{URL::to("home/autocomplete")}}',
                      dataType: "json",
                      data: {
                        search: request.term
                      },
                      success: function( data ) {
                        response( data );
                      }
                    });
                  },
                  minLength: 1
                });

                

                // $('body').on('keyup', "#search", function () {
                //     var $this = $(this);
                //     $.post('{{URL::to("home/autocomplete")}}', {search: $this.val()}, function (data) {
                //         $this.autocomplete({
                //             minLength: 0,
                //             source: data
                //         })
                //     }, 'json');
                // });
            });




            // $( "#city" ).autocomplete({
            //   source: function( request, response ) {
            //     $.ajax({
            //       url: "http://gd.geobytes.com/AutoCompleteCity",
            //       dataType: "jsonp",
            //       data: {
            //         q: request.term
            //       },
            //       success: function( data ) {
            //         response( data );
            //       }
            //     });
            //   },
            //   minLength: 3,
            //   select: function( event, ui ) {
            //     log( ui.item ?
            //       "Selected: " + ui.item.label :
            //       "Nothing selected, input was " + this.value);
            //   },
            //   open: function() {
            //     $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            //   },
            //   close: function() {
            //     $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
            //   }
            // });

        </script>
        <!-- ./page scripts -->
    </body>
</html>