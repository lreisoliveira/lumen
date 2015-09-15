<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Instituicao;

class Instituicoes extends BaseController
{
	public function get()
	{
		$instituicao = new Instituicao;
		//return $instituicao->all();
		return $instituicao->get(['nome']);
		
	}
}
