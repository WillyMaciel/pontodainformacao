<?php

class Produtos extends Eloquent {

	protected $table = 'produtos';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function producttocategory()
    {
        return $this->hasMany('Productocategory');
    }
    public function imagens()
    {
        return $this->hasMany('ProdutoImagem')->orderBy('ordem');
    }
}