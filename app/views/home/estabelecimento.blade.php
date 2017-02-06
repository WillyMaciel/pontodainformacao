@extends('template.home2')

@section('content')
<?php 
$count=5;
$auxRua='';
?>
<div class="col-xs-12 push-down-20">
    @if(isset($categorias) && !$categorias->isEmpty())
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="top:-120px">
            <div class="panel panel-warning" style="background: #FFB90F;border:0px; ,/*position:absolute*/; top: -300px"">
                <div class="panel-heading text-center" style="background: #FFB90F; color: white; border:0px"><strong style="font-size: 15px;">CATEGORIAS</strong></div>
                <div class="panel-body" style="max-height: 500px; overflow-y: Auto;width: 100%; background:#b4d35c; font color: white; border: 5px solid #d9950e; border-left: 5px solid #d9950e; border-right: 5px solid #d9950e; border-bottom: 5px solid #d9950e; padding: 5px 0;">
                    @if(isset($categorias) && !$categorias->isEmpty())
                        @foreach($categorias as $categoria)
                            <div class="col-xs-12 padding-v-1" style="background:#b4d35c; color: white; text-align:left">
                                <a class="col-xs-12 btn btn-sm {{{ count($categorySel) > 0 && $categoria->id == $categorySel->id ? 'btn-success' : '' }}}" href="{{URL::to("home/estabelecimento")}}/{{$id}}/{{$categoria->id}}"><strong style="font-size: 13px; text-align=Left; color: white">{{$categoria->nome}}</strong></a>
                            </div>
                        @endforeach
                    @endif
                    <div class="push-down-10" style="clear: both;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-offset-1" style="top:-80px">
            @if((isset($estabelecimentos) && !$estabelecimentos->isEmpty()) || (isset($topEstabelecimentos) && !$topEstabelecimentos->isEmpty()))
                <div class="col-lg-12 padding-v-5">
                    <div class="panel panel-warning">
                        
                        <div class="panel-heading text-center">
                            @if(count($categorySel) > 0)
                            <strong style="font-size: 16px;">{{$categorySel->nome}}</strong>
                            @endif
                            <button class="btn btn-default pull-right" id="btn-print"; style="background:#b4d35c; color: white; font-size: 12px"><i class="fa fa-print"></i> Imprimir Lista</button>
                            <div style="clear: both;"></div>
                        </div>
                        <div class="panel-body" style="max-height:500px; overflow-y: Auto;width: 100%">
                            <div style="margin: 0 auto" id="div-print">
                                <div class="col-md-4 col-xs-12 text-center hidden-print">
                                    @if(!empty($imagem))
                                        <img style="width: 150px; height: 150px;" src="/{{ (!empty($imagem)) ? $imagem->caminho_completo : 'uploads/categorias/sem_foto.gif' }}">
                                    @else
                                        <img style=" height: 150px; border: 0px;">
                                    @endif
                                </div>
                                <div class="col-xs-12 text-center visible-print-block">
                                    <legend>www.pontodainformacao.com.br</legend><br><br>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    @if(INPUT::has('search'))
                                        <h3>"{{INPUT::get('search')}}"</h3>
                                    @endif
                                </div>
                                @if(!$estabelecimentos->isEmpty() || !$topEstabelecimentos->isEmpty())
                                    @if(isset($topEstabelecimentos) && !$topEstabelecimentos->isEmpty())
                                        <div class="col-md-8 col-xs-12 hidden-print" style="border: 1px; border: #FFB90F 5px solid;border-radius: 10px; padding:10px;">
                                            @foreach($topEstabelecimentos as $topEstabelecimento)
                                                <a href="{{URL::to("usuario/dados-company/$topEstabelecimento->id")}}"  onclick="window.open('{{URL::to("usuario/dados-company/$topEstabelecimento->id")}}', 'newwindow', 'width=500, height=500'); return false;"> {{$topEstabelecimento->company_name}}</a> <br/>
                                                <font color="black">{{ $topEstabelecimento->rua }}
                                                {{ isset($topEstabelecimento->company_numero) ? ', nº ' . $topEstabelecimento->company_numero : '' }}
                                                {{ isset($topEstabelecimento->company_loja) ? ', lj ' . $topEstabelecimento->company_loja : '' }}
                                                {{ isset($topEstabelecimento->company_andar) && !empty($topEstabelecimento->company_andar) ? ', ' . $topEstabelecimento->company_andar. 'º Andar' : '' }}</font>  <br/>
                                            @endforeach
                                        </div>
                                        <div class="col-md-8 col-xs-12 visible-print-block">
                                            @foreach($topEstabelecimentos as $topEstabelecimento)
                                                {{$topEstabelecimento->company_name}} <br/>
                                                <font color="black">{{ $topEstabelecimento->rua }}
                                                {{ isset($topEstabelecimento->company_numero) ? ', nº ' . $topEstabelecimento->company_numero : '' }}
                                                {{ isset($topEstabelecimento->company_loja) ? ', lj ' . $topEstabelecimento->company_loja : '' }}
                                                {{ isset($topEstabelecimento->company_andar) && !empty($topEstabelecimento->company_andar) ? ', ' . $topEstabelecimento->company_andar. 'º Andar' : '' }}</font>  <br/> 
                                            @endforeach
                                            <p>
                                        </div>
                                    @endif
                                    <div class="col-md-12 col-xs-12 hidden-print">
                                        @foreach($estabelecimentos as $estabelecimento) <?php $count++; ?>
                                            @if($estabelecimento->rua != $auxRua)
                                                <legend class="push-up-20 push-down-0" style="margin-bottom: 0px; font-size:16px" >{{ $estabelecimento->rua }}</legend>
                                                <?php $auxRua = $estabelecimento->rua ?>
                                            @endif
                                            <div class="col-xs-12 push-up-10 {{($count % 2 == 0) ? 'bg-warning' : ''}}">
                                                <p class="hidden-print" style="margin-bottom: 0px"><strong><a href="{{URL::to("usuario/dados-company/$estabelecimento->id")}}"  onclick="window.open('{{URL::to("usuario/dados-company/$estabelecimento->id")}}', 'newwindow', 'width=500, height=500'); return false;"> {{$estabelecimento->company_name}}</a></strong></p>
                                                <p class="visible-print-block" style="margin-bottom: 0px"> {{$estabelecimento->company_name}}</p> 
                                                <p style="color: #000; margin-bottom: 0px">
                                                    {{ $estabelecimento->rua }} 
                                                    {{ isset($estabelecimento->company_numero) ? ', nº ' . $estabelecimento->company_numero : '' }}
                                                    {{ isset($estabelecimento->company_loja) ? ', lj ' . $estabelecimento->company_loja : '' }}
                                                    {{ isset($estabelecimento->company_andar) && !empty($estabelecimento->company_andar) ? ', ' . $estabelecimento->company_andar. 'º Andar' : '' }}
                                                </p>
                                                </div>
                                        @endforeach
                                        <div style="clear: both;"></div>
                                    </div>
                                    <div class="col-md-8 col-xs-12 visible-print-block" >
                                        @foreach($estabelecimentos as $estabelecimento) <?php $count++; ?>
                                            @if($estabelecimento->rua != $auxRua) <p>
                                                <legend class="push-up-20 push-down-0" style="margin-bottom: 0px; font-size:16px" >{{ $estabelecimento->rua }}</legend> <p>
                                                <?php $auxRua = $estabelecimento->rua ?>
                                            @endif
                                            <div class="col-xs-12 push-up-10 {{($count % 2 == 0) ? 'bg-warning' : ''}}">
                                                <p class="hidden-print" style="margin-bottom: 0px"><strong><a href="{{URL::to("usuario/dados-company/$estabelecimento->id")}}"  onclick="window.open('{{URL::to("usuario/dados-company/$estabelecimento->id")}}', 'newwindow', 'width=500, height=500'); return false;"> {{$estabelecimento->company_name}}</a></strong></p>
                                                <p class="visible-print-block" style="margin-bottom: 0px"> {{$estabelecimento->company_name}}</p>
                                                <p style="color: #000; margin-bottom: 0px">
                                                    {{ $estabelecimento->rua }} 
                                                    {{ isset($estabelecimento->company_numero) ? ', nº ' . $estabelecimento->company_numero : '' }}
                                                    {{ isset($estabelecimento->company_loja) ? ', lj ' . $estabelecimento->company_loja : '' }}
                                                    {{ isset($estabelecimento->company_andar) && !empty($estabelecimento->company_andar) ? ', ' . $estabelecimento->company_andar. 'º Andar' : '' }} 
                                                </p>
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
@stop

<div class="col-xs-12 push-down-20">
    @if(isset($categorias) && !$categorias->isEmpty())
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 padding-v-5">
            <div class="panel panel-warning">
                <div class="panel-heading"><strong>Categorias:</strong></div>
                <div class="panel-body" style="background:#b4d35c;">
                    @if(isset($categorias) && !$categorias->isEmpty())
                        @foreach($categorias as $categoria)
                            <div class="col-xs-12 padding-v-5">
                                <a class="col-xs-12 btn btn-sm btn-{{{ count($categorySel) > 0 && $categoria->id == $categorySel->id ? 'default' : 'success' }}}" href="{{URL::to("home/estabelecimento")}}/{{$id}}/{{$categoria->id}}"><strong>{{$categoria->nome}}</strong></a>
                            </div>
                        @endforeach
                    @endif
                    <div class="push-down-10" style="clear: both;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            
                <div class="col-lg-12 padding-v-5">
                    <div class="panel panel-warning">
                        
                        <div class="panel-heading text-center">
                            @if(count($categorySel) > 0)
                            <strong style="font-size: 16px;">{{$categorySel->nome}}</strong>
                            @endif
                            <button class="btn btn-default pull-right" id="btn-print"><i class="fa fa-print"></i> Imprimir</button>
                            <div style="clear: both;"></div>
                        </div>
                        <div class="panel-body" id="div-print">
                            <div style="margin: 0 auto">
                                <div class="col-md-4 col-xs-12 text-center hidden-print">
                                    <img style="width: 150px; height: 150px;" src="/{{ (!empty($imagem)) ? $imagem->caminho_completo : 'uploads/categorias/sem_foto.gif' }}">
                                </div>
                                <div class="col-xs-12 text-center visible-print-block">
                                    <legend>www.PONTOdaINFORMACAO.com.br</legend><br><br>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    @if(INPUT::has('search'))
                                        <h3>"{{INPUT::get('search')}}"</h3>
                                    @endif
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    @if(is_array($estabelecimentos))
                                        @foreach($estabelecimentos as $estabelecimento) <?php $count++; ?>
                                            @if($estabelecimento->rua != $auxRua)
                                                <legend class="push-up-20 push-down-0" style="margin-bottom: 0px">{{ $estabelecimento->rua }}</legend>
                                                <?php $auxRua = $estabelecimento->rua ?>
                                            @endif
                                            <div class="col-xs-12 push-up-10 {{($count % 2 == 0) ? 'bg-warning' : ''}}">
                                                <p><strong>{{$estabelecimento->company_name}}</strong></p>
                                                <p style="color: #000; margin-bottom: 0px">
                                                    {{ $estabelecimento->rua }}
                                                    {{ isset($estabelecimento->company_numero) ? ', nº ' . $estabelecimento->company_numero : '' }}
                                                    {{ isset($estabelecimento->company_loja) ? ', lj ' . $estabelecimento->company_loja : '' }}
                                                    {{ isset($estabelecimento->company_andar) ? ', ' . $estabelecimento->company_andar. 'º Andar' : '' }}
                                                </p>
                                               </div>
                                        @endforeach
                                    @else
                                    <div class="alert alert-warning teste-center">Nenhum estabelecimento encontrado para esses filtros!</div>
                                    @endif
                                    <div style="clear: both;"></div>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @else
    <div class="alert alert-warning">Nenhuma categoria cadastrada neste centro!</div>
    @endif
</div>  
<!-- ./page content -->
@stop