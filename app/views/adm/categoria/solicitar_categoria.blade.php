@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb push-down-0">
    <li><a href="#">Painel</a></li>
    <li class="active">Solicitar Categoria</li>
</ul>
<!-- END BREADCRUMB -->    

<!-- START CONTENT FRAME -->
<div class="content-frame">                                    
    <!-- START CONTENT FRAME TOP -->
    <div class="content-frame-top">
        <div class="page-title">                    
            <h2><span class="fa fa-pencil"></span> Solicitar Categoria</h2>
        </div>
    </div>
    <!-- END CONTENT FRAME TOP -->
    
    <div class="panel panel-primary">
    	<form method="post">
	        <div class="panel-body">
	            <div class="form-group">
	                <label>Informe o nome da categoria que você acha que devemos incluir</label>
	                <input type="text" class="form-control" name="nome_categoria" placeholder="Nome da categoria" REQUIRED>
	            </div>
	            <div class="form-group">
	                <label>Observação</label>
	                <textarea class="form-control" name="observacao" placeholder="Detalhes da categoria, como por exemplo, 'Gostaria de acrescentar a sub-categoria notebook que deveria ficar dentro da categoria Tecnologia'" rows="3"></textarea>
	            </div>
	        </div>
	        <div class="panel-footer">
	            <button class="btn btn-success pull-right"><span class="fa fa-envelope-o"></span> Send</button>
	        </div>
        </form>
    </div>
        
    </div>
    <!-- END CONTENT FRAME BODY -->
</div>
<!-- END CONTENT FRAME -->            
@stop    
