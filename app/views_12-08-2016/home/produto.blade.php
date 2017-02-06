@extends('template.home')

@section('content')

<div class="page-content-holder padding-v-30">
                        
    <div class="col-md-12 this-animate animated fadeInLeft this-animated" data-animate="fadeInLeft" style="color:white;">
        <div class="text-column">
            <strong><h3 style="color:white;">{{$produto->nome}}</h3></strong>
        </div>
        
        <div class="row">
        	@if(!$produto->imagens->isEmpty())
	            <div class="col-md-6 this-animate animated fadeInLeft this-animated" data-animate="fadeInLeft">
	                <div class="jcarousel">
	                    <ul>
	                    	@foreach($produto->imagens AS $imagem)
	                        <li>
                            <img src="/{{$imagem->caminho_completo}}" class="hidden-xs" width="514" height="400" alt="">
                            <img src="/{{$imagem->caminho_completo}}" class="visible-xs" width="80%" height="40%" alt="">
                          </li>
	                        @endforeach
	                    </ul>
	                </div>
	                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
	                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
	            </div>
	        @endif
            <div class="col-md-6 this-animate animated fadeInRight this-animated" data-animate="fadeInRight">
               	<div class="row">
               		<div class="col-md-4">
               			
               		</div>
               		<div class="col-md-8">
               			<strong><h4 style="color:white;">{{$produto->user->company_name}}</h4></strong>
               		</div>
               	</div>
               	<div class="row">
               		<div class="col-md-4">
               			Site da empresa
               		</div>
               		<div class="col-md-8">
               			<a href="{{$produto->user->company_site}}">{{$produto->user->company_site}}</a>
               		</div>
               	</div>
               	<div class="row">
               		<div class="col-md-4">
               			Telefone de contato
               		</div>
               		<div class="col-md-8">
               			{{$produto->user->company_telefone}}
               		</div>
               	</div>
               	<div class="row">
               		<div class="col-md-4">
               			Endereço
               		</div>
               		<div class="col-md-8">
               			@if(!empty($produto->user->centro_id))
               				{{$produto->user->centro->nome}}, 
               			@endif
               			@if(!empty($produto->user->rua_id))
               				{{$produto->user->rua->nome}} 
               			@endif
               			@if(!empty($produto->user->company_numero))
               				número {{$produto->user->company_numero}} 
               			@endif
               			@if(!empty($produto->user->company_loja))
               				loja {{$produto->user->company_loja}}
               			@endif
               		</div>
               	</div>
               	@if(!empty($produto->user->company_andar))
	               	<div class="row">
	               		<div class="col-md-4">
	               			Andar
	               		</div>
	               		<div class="col-md-8">
	               			{{$produto->user->company_andar}}
	               		</div>
	               	</div>
               	@endif
               	<div class="row">
               		<div class="col-md-4">
               			Email
               		</div>
               		<div class="col-md-8">
               			{{$produto->user->company_email}}
               		</div>
               	</div>
               	<div class="row">
               		<div class="col-md-4">
               			Tags
               		</div>
               		<div class="col-md-8">
               			{{$produto->user->company_tags}}
               		</div>
               	</div>

            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
        		<div class="divider"><div class="box"></div></div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-12">
        		<strong><h3 style="color:white;">Informações do produto: {{$produto->nome}}</h3></strong>
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-3">
        		Descrição:
        	</div>
        	<div class="col-md-9">
        		{{$produto->descricao or 'Não Informado'}}
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-3">
        		Preço:
        	</div>
        	<div class="col-md-9">
        		{{$produto->preco or 'Não Informado'}}
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-3">
        		Quantidade:
        	</div>
        	<div class="col-md-9">
        		{{$produto->quantidade or 'Não Informada'}}
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-3">
        		Cor:
        	</div>
        	<div class="col-md-9">
        		{{$produto->cor or 'Não Informada'}}
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-3">
        		Modelo:
        	</div>
        	<div class="col-md-9">
        		{{$produto->modelo or 'Não Informado'}}
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-3">
        		Peso:
        	</div>
        	<div class="col-md-9">
        		{{$produto->peso or 'Não Informado'}}
        	</div>
        </div>
    </div>
</div>


@stop