<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class InstituicoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$file = '/var/www/lumen/database/_files/instituicoes.txt';
		$ponteiro = fopen ($file, "r");
		while (!feof ($ponteiro)) {

			$texto = fgets($ponteiro, 4096);
			
			list($nome,$cidade) = explode('-',$texto);
			
			$nome 	= trim($nome);
			$cidade = trim($cidade);
				
			if (is_string($nome) && is_string($cidade)) {
				$this->insert($nome,$cidade);
			}
    	}
    }
    
    private function insert($nome,$cidade)
    {
    	$hash = mt_rand(1, 9999) . mt_rand(1, 9999);
    	DB::table('instituicoes')->insert([
			'nome' 		=> $nome,
    		'cidade'	=> $cidade,
    		'token' 	=> password_hash( $hash,   PASSWORD_DEFAULT)
    	]);
    }
    
}