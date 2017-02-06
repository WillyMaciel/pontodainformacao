<?php

class CentroController extends BaseController {

	public function getIndex()
	{
		$menu = 1;
		$centros = Centros::orderBy('nome')->get();
		return View::make('adm.centro.index', compact('centros', 'menu'));
	}

	public function getCentro($id = null)
	{
		$menu = 2;
		$centro = Centros::find($id);
		return View::make('adm.centro.centro', compact('centro', 'menu'));
	}

	public function getCadastroGeral($id = null)
	{
		$menu = 2;
		$centro = Centros::find($id);

		$centros = Centros::lists('nome', 'id');

		$pacotes = Pacotes::where('centro_id','=',$id)->get();
		$ruas = Ruas::where('centro_id','=',$id)->get();
		$categorias = Categories::select('categories.id', 'categories.nome', 'categorias_imagem.caminho_completo', 'categorias_imagem.id as id_imagem')->leftjoin('categorias_imagem', 'categorias_imagem.categoria_id','=', 'categories.id')->where('categories.centro_id','=',$id)->whereNull('categories.deleted_at')->orderBy('categories.nome')->get();

		return View::make('adm.centro.cadastros', compact('pacotes', 'ruas', 'categorias', 'centro', 'menu', 'centros'));
	}

	public function postSave()
	{	
		extract(Input::all());

		$Centros = new Centros();
		$Centros->nome = $nome;
		$Centros->created_at = date('Y-m-d H:i:s');
		$Centros->updated_at = date('Y-m-d H:i:s');
		$Centros->save();
		return Redirect::to('centro')->with('success', array(1 => 'Centro Comercial Cadastrado com sucesso!'));
	}

	public function postUpdate()
	{	
		extract(Input::all());

		$Centros = Centros::findOrFail($id);
		$Centros->nome = $nome;		
		$Centros->updated_at = date('Y-m-d H:i:s');
		$Centros->save();
		return Redirect::to('centro')->with('success', array(1 => 'Centro Comercial Atualizado com sucesso!'));
	}

	public function getRuas($id)
	{
		$centro = Centros::find($id);
		$ruas = $centro->ruas;
		return View::make('adm.centro.ruas', compact('centro','ruas'));
	}

	public function postRuas()
	{
		extract(Input::all());
		
		$rua = new Ruas();
		$rua->nome = $nome;
		$rua->centro_id  = $centro_id;
		$rua->created_at = date('Y-m-d H:i:s');
		$rua->updated_at = date('Y-m-d H:i:s');
		$rua->save();
		return Redirect::to('centro/cadastro-geral/'.$rua->centro_id)->with('success', array(1 => 'Rua Cadastrada com sucesso!'));
	}

	public function postRuaUpdate()
	{
		extract(Input::all());
		
		$rua = Ruas::findOrFail($id_rua);
		$rua->nome = $nome;
		$rua->updated_at = date('Y-m-d H:i:s');
		$rua->save();
		return Redirect::to('centro/cadastro-geral/'.$rua->centro_id)->with('success', array(1 => 'Rua Atualizada com sucesso!'));
	}

	public function getOptionRuas($id){
		$option = '';
		$ruas = Ruas::where('centro_id','=',$id)->orderBy('nome')->get();
		foreach ($ruas as $rua) {
			$option .= '<option value="'.$rua->id.'">'.$rua->nome.'</option>';
		}
		return $option;
	}
}
