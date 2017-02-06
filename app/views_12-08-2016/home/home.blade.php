@extends('template.home')

@section('content')
<?php 
$categoriaSelecionada = Input::get('category');
$centroSelecionado = Input::get('centro');
$ruaSelecionada = Input::get('rua');
?>
<style type="text/css">
.logo {
    float: left;
    padding: 15px 0px;
    font-size: 1px;
    text-indent: 99999px;
    background: url("../img/logo.png") center center no-repeat;
    max-width: 100%;
    height: auto;
    float: left;
    display: block;
    /*background-size: 100% 100%;
    background-repeat: no-repeat;*/
}
</style>
<div class="login-container">
    <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 col-xs-12">
        <div class="login-box animated fadeInDown row" style="width: auto">
            <div class="login-body">
                <div class="text-column this-animate" data-animate="fadeInRight">                                    
                    <div class="list-links">
                        <div class="col-xs-12 push-down-10">
                            <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6" style"left:50px">
                                <div class="logo" style="width: 440px; height: 130px"></div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3"></div>
                        </div>
                        @if(isset($centros) && !$centros->isEmpty())
                            @foreach($centros as $centro)
                                <div class="col-xs-12 push-down-10">
                                    <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6">
                                        <a class="col-xs-12 btn btn-success" style="color:white; width:120px; left:35%; background-image: linear-gradient(to bottom, #b4d35c, #445516 130%); box-shadow: 1px 1px 1px #000000" href="{{URL::to("home/estabelecimento")}}/{{$centro->id}}">{{$centro->nome}}</a>
                                    </div>
                                    <div class="col-lg-3 col-md-3"></div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning">Nenhum Centro Encontrado!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop