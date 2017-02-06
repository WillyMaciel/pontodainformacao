<?php

View::composer(['adm.includes.mensagens', 'adm.usuario.includes.mensagens'], function($view)
{
	$mensagens_recebidas = Auth::user()->mensagens_recebidas()->orderBy('created_at', 'DESC')->get();

	$novas_count = Auth::user()->mensagens_recebidas()->where('visualizado', 0)->count();

    $view->with('mensagens', $mensagens_recebidas)
    	 ->with('novas_count', $novas_count);
});