<?php

class DeleteController extends BaseController {

	public function getRua($id,$centro)
	{
		$rua = Ruas::find($id);
		$rua->delete();

		$clientes = User::where('rua_id','=',$id)->get();
		foreach($clientes as $cliente){
			$cliente->rua_id = 0;
			$cliente->save();
		}
		return Redirect::to('centro/cadastro-geral/'.$centro);
	}

	public function getPacote($id,$centro)
	{
		$pacote = Pacotes::find($id);
		$pacote->delete();

		$clientes = User::where('pacote_id','=',$id)->get();
		foreach($clientes as $cliente){
			$cliente->pacote_id = 0;
			$cliente->save();
		}
		return Redirect::to('centro/cadastro-geral/'.$centro);
	}

	public function getCategoria($id,$centro)
	{
		$categoria = Categories::find($id);
		$categoria->delete();

		$clientes = UserCategorias::where('categories_id','=',$id)->delete();
		return Redirect::to('centro/cadastro-geral/'.$centro);
	}

	public function getCentro($id)
	{
		$centro = Centros::find($id);
		$centro->delete();

		$clientes = User::where('centro_id','=',$id)->get();
		foreach($clientes as $cliente){
			$cliente->centro_id = 0;
			$cliente->rua_id = 0;
			$cliente->save();
		}
		return Redirect::to('centro');
	}

}
