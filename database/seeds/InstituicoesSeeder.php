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
    	
		$file = '/var/www/lumen/database/csv/teste1';
		$ponteiro = fopen ($file, "r");
		while (!feof ($ponteiro)) {
			$texto = fgets($ponteiro, 4096);
			if (is_string($texto)) {
				var_dump($texto);
				//$this->insert($texto);
			}
    	}
    }
    
    private function insert($texto)
    {
    	DB::table('instituicoes')->insert([
    			'nome' => $texto,
    	]);
    }
    
}
