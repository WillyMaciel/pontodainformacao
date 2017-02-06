<?php

class CategoriasImagem extends Eloquent {

	protected $table = 'categorias_imagem';

	public function produtos()
	{
		return $this->belongsTo('Produtos');
	}

}