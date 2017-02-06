@extends('template.home')

@section('content')

<div class="page-content-holder padding-v-30" style="color:white;">
                        
    <div class="col-md-7 this-animate animated fadeInLeft this-animated" data-animate="fadeInLeft">
    	<form method="post">
	        <div class="text-column">
	            <strong><h4 style="color:white;">Fale Conosco</h4></strong>
	            <div class="text-column-info">
	                {{ $texto->descricao }}
	            </div>
	        </div>
	        @if(Input::has('success'))
		        <p class="text-success">
	        		Sua mensagem foi enviada com sucesso! Entraremos em contato o mais rápido possível.
		        </p>
	        @endif
	        
	        <div class="row">
	            <div class="col-md-6">
	                <div class="form-group">
	                    <label>Nome <span class="text-hightlight">*</span></label>
	                    <input type="text" name="nome" class="form-control" required>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                    <label>E-mail <span class="text-hightlight">*</span></label>
	                    <input type="text" name="email" class="form-control" required>
	                </div>
	            </div>
	            <div class="col-md-12">
	                <div class="form-group">
	                    <label>Assunto <span class="text-hightlight">*</span></label>
	                    <input type="text" name="assunto" class="form-control" required>
	                </div>
	                <div class="form-group">
	                    <label>Mensagem <span class="text-hightlight">*</span></label>
	                    <textarea class="form-control" name="mensagem" rows="8" required></textarea>
	                </div>
	                <button class="btn btn-primary btn-lg pull-right">Enviar Mensagem</button>
	            </div>
	        </div>
        </form>
    </div>
    
    
</div>


@stop