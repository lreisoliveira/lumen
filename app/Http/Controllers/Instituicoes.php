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
		
		$response = new Response();
		$response->setStatusCode(200);
		$response->setContent($conteudo);
		$response->header('Content-Type','application/json; charset=UTF-8');
		return $this->converteUnicode($conteudo);
	}
	
	private function converteUnicode($string)
	{
		$string = str_replace('\u00e0','à',$string);
		$string = str_replace('\u00c0','À',$string);
		$string = str_replace('\u00e3','ã',$string);
		$string = str_replace('\u00c3','Ã',$string);
		$string = str_replace('\u00e1','á',$string);
		$string = str_replace('\u00c1','Á',$string);
		$string = str_replace('\u00e9','é',$string);
		$string = str_replace('\u00c9','É',$string);
		$string = str_replace('\u00ed','í',$string);
		$string = str_replace('\u00cd','Í',$string);
		$string = str_replace('\u00f3','ó',$string);
		$string = str_replace('\u00d3','Ó',$string);
		$string = str_replace('\u00fa','ú',$string);
		$string = str_replace('\u00da','Ú',$string);
		$string = str_replace('\u00e7','ç',$string);
		$string = str_replace('\u00c7','Ç',$string);
				
		return $string;
	}
}
