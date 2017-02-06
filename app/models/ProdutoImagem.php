'<?php

class ProdutoImagem extends Eloquent {

	protected $table = 'produtos_imagem';

	public function produtos()
	{
		return $this->belongsTo('Produtos');
	}

}