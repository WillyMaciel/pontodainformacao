<?php

class PacotesController extends BaseController {

	public function getIndex()
	{
		$pacotes = Pacotes::orderBy('nome')->get();
		return View::make('adm.pacote.index', compact('pacotes'));
	}

	public function postSave()
	{	
		extract(Input::all());

		$pacotes = new Pacotes();
		$pacotes->nome = $nome;
		$pacotes->valor = $valor;
		$pacotes->vezes = $vezes;
		$pacotes->centro_id = $centro_id;
		$pacotes->valido_por = $valido_por;
		$pacotes->created_at = date('Y-m-d H:i:s');
		$pacotes->updated_at = date('Y-m-d H:i:s');
		$pacotes->favorito = (isset($favorito) && $favorito == 'on') ? 1 : 0;
		$pacotes->categoria = (isset($categoria) && $categoria == 'on') ? 1 : 0;
		$pacotes->tags = $tags;
		$pacotes->save();
		return Redirect::to('centro/cadastro-geral/'.$pacotes->centro_id)->with('success', array(1 => 'Pacote Cadastrado com sucesso!'));
	}

	public function postUpdate()
	{	
		extract(Input::all());

		$pacotes = Pacotes::FindOrFail($id_pacote);
		$pacotes->nome = $nome;
		$pacotes->valor = $valor;
		$pacotes->vezes = $vezes;
		$pacotes->centro_id = $centro_id;
		$pacotes->valido_por = $valido_por;
		$pacotes->updated_at = date('Y-m-d H:i:s');
		$pacotes->favorito = (isset($favorito) && $favorito == 'on') ? 1 : 0;
		$pacotes->categoria = (isset($categoria) && $categoria == 'on') ? 1 : 0;
		$pacotes->tags = $tags;
		$pacotes->save();
		return Redirect::back()->with('success', array(1 => 'Pacote Atualizado com sucesso!'));
	}

}
