<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function pacote()
	{
		return $this->belongsTo('Pacotes');
	}

	public function produtos()
	{
		return $this->hasMany('Produtos');
	}

	public function totProdutos()
	{
		return $this->produtos()->count();
	}

	public function centro()
	{
		return $this->belongsTo('Centros');
	}

	public function rua()
	{
		return $this->belongsTo('Ruas');
	}

	public function mensagens_recebidas()
	{
		return $this->hasMany('Mensagem', 'destinatario_id');
	}

	public function mensagens_enviadas()
	{
		return $this->hasMany('Mensagem', 'remetente_id');
	}

	public function ultimos_contatos()
	{
		$ids = DB::table('mensagens')->select('remetente_id')->distinct()->where('destinatario_id', Auth::user()->id)->lists('remetente_id');

		return User::whereIn('id', $ids)->get();
	}
}
