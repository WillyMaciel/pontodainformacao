@extends('template.home')

@section('content')

<div class="page-content-holder padding-v-30">
                        
    <div class="block-heading this-animate animated fadeInLeft this-animated" data-animate="fadeInLeft">
        <strong><h2 style="color:white;">Termos de uso</h2></strong>
        <div class="block-heading-text" style="color:white;">
            {{ $texto->descricao }}
        </div>
    </div>  
    
    
</div>


@stop