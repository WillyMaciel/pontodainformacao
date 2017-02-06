@extends('template.login')


@section('content')
<div class="login-box login-box-left animated fadeInDown row">
    <div class="login-body login-body-left">
        <div class="login-subtitle text-center" style="margin-top: 28%;">
            <h5><span style="color: #FFB90F;">Sou Lojista, </span><a href="sign-up">QUERO me Cadastrar!</a></h5>
        </div>
    </div>
</div>
<div class="login-box login-box-right animated fadeInDown row">
    <div class="login-body">
        <div class="login-title text-center">Já sou Cliente!</div>
        <form class="form-horizontal" method="post">
        <div class="form-group">
            <div class="col-md-12">
                <input type="text" name="email" class="form-control" placeholder="E-mail"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <input type="password" name="password" class="form-control" placeholder="Senha"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6">
                <a href="{{URL::to("password/remind")}}" class="btn btn-link btn-block">Esqueceu sua senha?</a>
            </div>
            <div class="col-md-6">
                <button class="btn btn-info btn-block">Log In</button>
            </div>
        </div>
        <!--div class="login-subtitle">
            Ainda não criou sua conta? <a href="sign-up">Crie agora mesmo!</a>
        </div-->
        </form>
    </div>
</div>
<div class="clear"></div>
@stop