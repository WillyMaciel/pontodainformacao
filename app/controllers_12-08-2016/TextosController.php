<?php

class TextosController extends BaseController {

	public function getIndex()
	{
		$menu = 1;
		$textos = Texto::orderBy('titulo')->get();
		return View::make('adm.parametros.index', compact('textos', 'menu'));
	}

	public function getEdit($id)
	{
		$menu = 1;
		$texto = Texto::find($id);
		return View::make('adm.parametros.edit', compact('texto', 'menu'));
	}

	public function postSave()
	{	
		extract(Input::all());
		$texto = Texto::where('titulo','=',$titulo)->first();
		$texto->descricao = $descricao;
		$texto->save();
		return Redirect::to('parametros')->with('success', array(1 => 'Parametro Alterado com sucesso!'));
	}

}
