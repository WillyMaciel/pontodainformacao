<?php

class MeusdadosController extends BaseController {

	public function getIndex($id = null)
	{

		$menu = 3;

		if(empty($id)){
			$menu = 1;
			$id = Auth::User()->id;
		}
		//echo $id;exit;
		if($id != 'novo') {
			$user = User::find($id);
			$user->visualizado = 1;
			$user->save();
			$centro =Centros::find($user->centro_id);
			$centros = Centros::OrderBy('nome')->get();
			$ruas = '';
			if(!empty($user->centro_id)){
				$ruas = Ruas::where('centro_id','=',$user->centro_id)->OrderBy('nome')->get();
			}
			$pacotes = Pacotes::where('centro_id','=',$user->centro_id)->OrderBy('nome')->get();
		} else {
			$menu = 1;
			$centros = Centros::OrderBy('nome')->get();
			$ruas = Ruas::OrderBy('nome')->get();
			return View::make('meusdados.cadastro', compact('menu', 'centros', 'ruas'));
		}

		$hoje = date('d/m/Y');
		$hojeDB = date('Y-m-d');

		if(Auth::user()->perfil != 1)
		{
			return View::make('meusdados.index', compact('user','centros','centro','ruas','id','pacotes','hoje','hojeDB','menu'));
		}
		else
		{
			return View::make('meusdados.index_admin', compact('user','centros','centro','ruas','id','pacotes','hoje','hojeDB','menu'));	
		}
	}

	public function postSave()
	{
		extract(Input::all());

		if(!empty($id)) { 
			$user = User::find($id);
		} else {
			$user = new User;
			$user->perfil = 2;
		}

		if (Input::hasFile('logotipo'))
		{
			$img = $this->uploadImage(Input::file('logotipo'), 'logotipos');
		    if($img)
		    {		    	
		    	$user->company_logotipo = $img['destinationPath'] . $img['filename'];
		    }
		}

		$user->nome = $nome;
		$user->sobrenome = $sobrenome;
		$user->email = $email;
		if(isset($senha) && !empty($senha) && isset($senha_confirma) && $senha_confirma == $senha){
			$user->password = Hash::make($senha);
		} 
		if(isset($favorito) && !empty($favorito))
		{
			$user->favorito = 1;			 
		}
		else 
		{
			$user->favorito = 0;
		}

		if(isset($categoria) && !empty($categoria))
		{
			$user->categoria = 1;			 
		}
		else 
		{
			$user->categoria = 0;
		}

		$user->cpf = $cpf;
		$user->telefone = $telefone;
		$user->celular = $celular;
		$user->company_name = $nome_company;
		$user->centro_id = $centro;
		$user->rua_id = $rua;
		if(isset($status) && $status == 'on')
		{
			$user->status = 1;
		}
		else
		{
			$user->status = 0;
		}
		$user->company_numero = $numero_company;
		$user->company_loja = $loja_company;
		$user->company_andar = $andar_company;
		$user->company_email = $email_company;
		$user->company_site = $site_company;
		$user->company_telefone = $telefone_company;
		if(isset($tags_company))
		{
			$user->company_tags = $tags_company;
		}
		$user->pacote_id = 0;
		$user->save();

		$id = (!empty($id)) ? $id : $user->id;
		Session::forget('arrAlerta');
		return Redirect::to('meusdados/'.$id)->with('success', array(1 => 'Dados Atualizados!'));
	}

	public function getRenovarPacote($id)
	{
		$user = User::FindOrFail($id);

		if($user->pacote)
		{
			$pacote_dias = $user->pacote->valido_por;

			$vencimento = Carbon::Now()->addDays($pacote_dias);
			$user->data_vencimento = $vencimento;

			$user->save();

			return Redirect::to('meusdados/'.$id)->with('success', array(1 => 'Pacote renovado por mais '. $pacote_dias . ' dias a partir da data de Hoje.'));

		}
		else
		{
			return Redirect::to('meusdados/'.$id)->with('danger', array(1 => 'Usuário não possui um pacote para renovar'));
		}


	}

	public function getAlterarPacote()
	{
		extract(Input::all());
		
		$user = User::find($id);
		$user->pacote_id = $pacote;
		//$user->data_vencimento = Formatter::stringToDate($data_vencimento);

		$pacote = Pacotes::find($pacote);

		$pacote_dias = $pacote->valido_por;

		$vencimento = Carbon::Now()->addDays($pacote_dias);

		$user->data_vencimento = $vencimento;
		$user->favorito = $pacote->favorito;
		$user->categoria = $pacote->categoria;

		$user->save();

		return Redirect::to('meusdados/'.$id)->with('success', array(1 => 'Pacote Atualizado!'));
	}

	public function getSolicitarPacote()
	{
		extract(Input::all());
		
		$Solicitarplano = new Solicitarplano;
		$Solicitarplano->user_id = Auth::User()->id;
		$Solicitarplano->mensagem = $mensagem;
		$Solicitarplano->status = 0;
		$Solicitarplano->created_at = date('Y-m-d H:i:s');
		$Solicitarplano->updated_at = date('Y-m-d H:i:s');
		$Solicitarplano->save();

		return Redirect::to('meusdados/'.Auth::User()->id)->with('success', array(1 => 'Plano Solicitado. Entraremos em contato assim que puder!'));
	}

}
