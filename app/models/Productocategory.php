<?php

class Productocategory extends Eloquent {

	protected $table = 'produtos_categorias';
	public $timestamps = false;

	public function produtos()
    {
        return $this->belongsTo('Produtos');
    }

    public function categorias()
    {
        return $this->belongsTo('Categories');
    }
}