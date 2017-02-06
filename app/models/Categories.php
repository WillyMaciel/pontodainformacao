<?php

class Categories extends Eloquent {

	protected $table = 'categories';

	public function subcategories()
	{
		return $this->hasMany('Categories', 'parent_id', 'id')->with('subcategories');
	}

	public function subs()
	{
		return $this->hasMany('Categories', 'parent_id', 'id');
	}

	public function hasSubCategories()
	{
		if($this->subs()->count() > 0)
			return true;
		else
			return false;

	}

	public function totSubCategories()
	{
		return $this->subs()->count();
	}
	
}