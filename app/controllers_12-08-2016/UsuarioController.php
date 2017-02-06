<?php

class UsuarioController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex($id_centro)
	{
		$menu = 2;
		$centro = Centros::find($id_centro);

		$usuarios    = User::where('centro_id','=',$id_centro)->get();
		$numUsersTot = count($usuarios);
		$pacotes = Pacotes::all();
		$pagination  = (Input::has('pagination')) ? Input::get('pagination') : 10;
		$usuarios = User::select('user.*', 'r.nome as rua')->leftJoin('ruas as r', 'r.id', '=', 'user.rua_id')->leftJoin('pacotes as p', 'p.id', '=', 'user.pacote_id');
		
		if(Input::has('nome') && !empty(Input::get('nome'))){
			$usuarios = $usuarios->where('user.nome','like','%'.Input::get('nome').'%')->orwhere('user.sobrenome','like','%'.Input::get('nome').'%')->orwhere('user.email','like','%'.Input::get('nome').'%')->orwhere('r.nome','like','%'.Input::get('nome').'%');
		}
		
		if(Input::has('pacote') && !empty(Input::get('pacote'))){
			$usuarios = $usuarios->where('user.pacote_id','=',Input::get('pacote'));
		}

		$usuarios = $usuarios->where('user.centro_id','=',$id_centro);

		if(Input::has("orderby"))
		{
			$usuarios->orderBy(Input::get('orderby'), Input::get('order'));
		}

		$usuarios = $usuarios->paginate($pagination);
		return View::make('adm.usuario.index', compact('numUsersTot','usuarios','pacotes','menu','centro'));
	}

	public function getSolicitacaoCliente($id_centro)
	{
		$menu = 2;
		$centro = Centros::find($id_centro);

		$solicitacoes = Solicitarplano::whereHas('user', function($query) use($id_centro)
		{
			$query->where('centro_id','=', $id_centro);
		})->OrderBy('created_at','desc')->get();
		return View::make('adm.usuario.solicitacaocliente', compact('solicitacoes','menu','centro'));
	}

	public function postSolicitacaoCliente($id_centro)
	{
		extract(Input::all());
		
		if(Session::has('arrAlerta'))
			Session::forget('arrAlerta');

		if(isset($solicitacoes) && !empty($solicitacoes)){
			foreach ($solicitacoes as $id) {
				$Solicitarplano = Solicitarplano::find($id);
				$Solicitarplano->status = $status;
				$Solicitarplano->updated_at = date('Y-m-d H:i:s');
				$Solicitarplano->save();
			}
			return Redirect::to('usuario/solicitacao-cliente/'.$id_centro)->with('success', array(1 => 'Solicitações atualizadas!'));
		} else {
			return Redirect::to('usuario/solicitacao-cliente/'.$id_centro)->with('danger', array(1 => 'Você deve selecionar ao menos uma solicitação para atualizar!'));
		}
	}

	public function getCategoriesUser($id)
	{
		$usuario = User::find($id);
		$menu = 2;
		$centro = Centros::find($usuario->centro_id);
		$categorias = Categories::select('categories.id','categories.nome','user_categorias.categories_id')
		->leftJoin('user_categorias', function($join) use($id)
        {
            $join->on('categories.id','=','user_categorias.categories_id')->where('user_categorias.user_id','=',$id);
        })
		->where('categories.centro_id','=',$usuario->centro_id)->whereNull('categories.deleted_at')
		->orderBy('categories.nome')->get();
		//UserCategorias::where('user_id','=',$usuario->id)->get();

		return View::make('adm.usuario.associate_category', compact('categorias', 'usuario', 'menu', 'centro'));
	}

	public function postSaveCategoriesUser()
	{
		extract(Input::all());
		//echo '<pre>';print_r($categorias) ;exit;
		UserCategorias::where('user_id', '=', $id_user)->delete();
		if(isset($categorias)){
			foreach ($categorias as $id_categoria) {
				UserCategorias::insert(array('user_id' => $id_user, 'categories_id' => $id_categoria));
			}
		}

		return Redirect::to('meusdados/'.$id_user);
	}

	public function getDadosCompany($id){
		$usuario = User::find($id);
		return View::make('adm.usuario.dados_company', compact('usuario'));
	}

	public static function getUsuariosRecentes()
	{
		return User::OrderBy('created_at', 'DESC')->take(10)->get();
	}

	public static function getUsuariosNovosCount()
	{
		return User::where('visualizado', 0)->count();
	}

	public function getStatusSwitch($id)
	{
		$user = User::findOrFail($id);

		$user->status = ($user->status == 1) ? 0 : 1;
		$user->save();

		return Redirect::back()->with('success', array(1 => "Status de $user->nome atualizado."));;
	}

	public function getCategoriaSwitch($id)
	{
		$user = User::findOrFail($id);

		$user->categoria = ($user->categoria == 1) ? 0 : 1;
		$user->save();

		return Redirect::back()->with('success', array(1 => "Categoria de $user->nome atualizado."));;
	}

	public function getFavoritoSwitch($id)
	{
		$user = User::findOrFail($id);

		$user->favorito = ($user->favorito == 1) ? 0 : 1;
		$user->save();

		return Redirect::back()->with('success', array(1 => "Favorito de $user->nome atualizado."));;
	}

	// public function getUsuariosRecentesReset()
	// {
	// 	DB::table('user')
 //            ->where('visualizado', 0)
 //            ->update(array('visualizado' => 1));
	// }
}