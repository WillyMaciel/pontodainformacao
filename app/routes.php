<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

if (Auth::check() && !Session::has('arrAlerta')){
	// Session::put('key', 'value');
	
	$arrAlerta = array('s' => array(),'c' => array());
	$solicitacoes = Solicitarplano::with('user','user.centro')->where('status','=','0')->get();
	$contador = 0;
	foreach($solicitacoes as $solicitacao){
		$arrAlerta['s'][$solicitacao->user->centro_id]['contador'] = (isset($arrAlerta['s'][$solicitacao->user->centro_id]['contador'])) ? $arrAlerta['s'][$solicitacao->user->centro_id]['contador'] + 1 : 1;
		$arrAlerta['s'][$solicitacao->user->centro_id]['centro_nome'] = (isset($solicitacao->user->centro)) ? $solicitacao->user->centro->nome : '';
		$contador++;
	}
	$clientes = User::whereNull('centro_id')->where('status','=','1')->where('created_at','like', '%'.date('Y-m-d').'%')->get();
	// var_dump($clientes);
	foreach($clientes as $cliente){
		$arrAlerta['c'][$cliente->id]['contador'] = (isset($arrAlerta['c'][$cliente->id]['contador'])) ? $arrAlerta['c'][$cliente->id]['contador'] + 1 : 1;
		$arrAlerta['c'][$cliente->id]['nome'] = $cliente->company_name;
		$contador++;
	}

	$arrAlerta['total'] = $contador;
	// var_dump($arrAlerta);exit;
	Session::put('arrAlerta', $arrAlerta);
}
Route::get('/', function()
{
	// return View::make('hello');
	if (Auth::check())
	{
	    return Redirect::to('home');
	} else {
		return Redirect::to('home/home');
	}
	
});
Route::controller('home','HomeController');

Route::controller('id', 'IdController');
Route::controller('delete', 'DeleteController');
Route::controller('usuario', 'UsuarioController');
Route::controller('categorias', 'CategoriasController');
Route::controller('centro', 'CentroController');
Route::controller('pacotes', 'PacotesController');
Route::controller('parametros', 'TextosController');
Route::get('meusdados/{id}', 'MeusDadosController@getIndex');
Route::resource('meusdados/alterar-pacote', 'MeusdadosController@getAlterarPacote');
Route::resource('meusdados/solicitar-pacote', 'MeusdadosController@getSolicitarPacote');
Route::controller('meusdados', 'MeusdadosController');
Route::controller('produto', 'ProdutoController');
Route::controller('password', 'RemindersController');
Route::post('msg-geral', 'MensagemController@postMsgGeral');
Route::resource('mensagens', 'MensagemController');

