<?php

class Centros extends Eloquent {

	protected $table = 'centros_comerciais';


	public function empresas()
	{
		return $this->hasMany('User', 'centro_id', 'id');
	}

	public function ruas()
	{
		return $this->hasMany('Ruas', 'centro_id', 'id')->orderBy('nome');
	}

	public function hasSubCompanies()
	{
		if($this->empresas()->count() > 0)
			return true;
		else
			return false;

	}

	public function totCompanies()
	{
		return $this->empresas()->count();
	}
	
	public function hasRuas()
	{
		if($this->ruas()->count() > 0)
			return true;
		else
			return false;

	}

	public function totRuas()
	{
		return $this->ruas()->count();
	}
}