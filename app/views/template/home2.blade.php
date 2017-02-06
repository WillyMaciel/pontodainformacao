<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>Ponto da Informação - Resultado da Pesquisa</title>
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
                background: url("../../img/logo2.png") top center no-repeat;
            @else
                background: url("../../../img/logo2.png") top center no-repeat;
            @endif
            max-width: 100%;
            height: auto;
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
            color: #d9950e;
            padding-right: 1%
        }
        </style>
        </head>
    <body style="background-color:#FFB90F; width:100%">
        <!-- page container -->
        <div class="page-container" style="background-color:#FFB90F; min-height: 100%; position:relative;">
            <!-- page header -->
            <div class="page-header" style="background-color:#FFB90F">
                
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
                            <div class="page-content-holder no-padding">
                            <div class="col-xs-12 push-down-10">
                                <div class="col-lg-offset-1 col-lg-6 col-md-offset-3 col-md-6" style="Top:20px; right:350px">
                                    <a href="{{ URL::to("home/home") }}">
                                        <div class="logo" style="width: 440px; height: 130px; text-center"></div>
                                    </a>
                                    <br/><br/><br/><br/>  
                                </div>
                            </div>
                            <!-- page title -->
                            <div class="page-title">
                                <div class="col-md-2"></div>
                                <form action="" method="get" id="form-search">
                                    <div class="col-lg-offset-1 col-lg-6 col-md-offset-6 col-md-8" style="Top:-100px;">
                                        <div class="input-group">
                                            <input type="text" autocomplete="off" name="search" id="search" class="form-control" value="{{Input::get('search')}}" placeholder="O que você está procurando?" />
                                            <span class="input-group-addon" style="cursor:pointer; border: none; background-color: #FFB90F;" id="span-search">
                                                <!-- <span class="fa fa-search"></span> -->
                                                <img @if(file_exists("../../img/ok2.png"))  src="../../img/ok2.png" @else src="../../../img/ok2.png" @endif style="margin-top: -18px; margin-left: -20px; position: relative; width: 53px; z-index: 10;">
                                            </span>
                                        </div>
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
                    <div class="row padding-v-30">
                        @section('content')

                        @show
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

                $("body").on('click', '#btn-print-preferencial', function(){
                    console.log("$this");
                    $("#div-print-preferencial").printElement();
                });

                $('body').on('keyup', "#search", function () {
                    var $this = $(this);
                    $.post('{{URL::to("home/autocomplete")}}', {search: $this.val()}, function (data) {
                        $this.autocomplete({
                            source: data
                        })
                    }, 'json');
                });
            });
        </script>
        <!-- ./page scripts -->
    </body>
</html>