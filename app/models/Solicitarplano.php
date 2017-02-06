<?php

class Solicitarplano extends Eloquent {

	protected $table = 'planos_solicitados';

	public function user()
	{
		return $this->belongsTo('User');
	}
}