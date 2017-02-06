<?php

class Mensagem extends Eloquent {

	protected $table = 'mensagens';


	public function destinatario()
	{
		return $this->belongsTo('User', 'destinatario_id', 'id');
	}

	public function remetente()
	{
		return $this->belongsTo('User', 'remetente_id', 'id');
	}
	
}