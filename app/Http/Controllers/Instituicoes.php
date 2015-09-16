<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Instituicao;

use Illuminate\Http\Response;

class Instituicoes extends BaseController
{
	public function get()
	{
		$instituicao = new Instituicao;
		//return $instituicao->all();
		$conteudo = $instituicao->get(['nome','cidade']);
		$conteudo = json_decode($conteudo,true);
		$response = new Response();
		$response->setStatusCode(200);
		$response->setContent($conteudo);
		$response->header('Content-type','application/json');
		$response->header('charset','utf-8');
		return $response;
	}
}
