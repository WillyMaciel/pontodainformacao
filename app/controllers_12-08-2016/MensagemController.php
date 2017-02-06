<?php

class MensagemController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$menu = 1;
		$nao_lidas_count = Auth::user()->mensagens_recebidas()->where('visualizado', 0)->count();
		$mensagens = Auth::user()->mensagens_recebidas()->orderBy('created_at', 'DESC')->paginate(10);
		$mensagens_enviadas = Auth::user()->mensagens_enviadas()->orderBy('created_at', 'DESC')->paginate(10);
		return View::make('adm.mensagens.index', compact('mensagens', 'mensagens_enviadas', 'nao_lidas_count', 'menu'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$menu = 2;

		return View::make('adm.mensagens.create', compact('menu'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		extract(Input::all());

		$m = new Mensagem;

		$m->remetente_id 	 = Auth::user()->id;
		$m->destinatario_id  = (!isset($destinatario_id)) ? 8 : $destinatario_id;
		$m->titulo 		 	 = $titulo;
		$m->mensagem 	 	 = $mensagem;
		$m->visualizado  	 = 0;

		$m->save();

		return Redirect::to('mensagens')->with('success', ['Mensagem enviada.']);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$menu = 1;

		$msg = Mensagem::findOrFail($id);

		if($msg->remetente_id != Auth::user()->id && $msg->destinatario_id != Auth::user()->id)
		{
			return Redirect::to('/')->with('success', ['Acesso negado']);
		}

		if($msg->destinatario_id == Auth::user()->id)
		{
			$msg->visualizado = 1;
			$msg->save();
		}

		$created_at = new Carbon($msg->created_at);

		$msg->created_formatado =  "{$created_at->toFormattedDateString()} , Enviado a {$created_at->diffForHumans(Carbon::now())}";

		return View::make('adm.mensagens.show', compact('msg', 'menu'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
