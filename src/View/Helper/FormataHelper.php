<?php
declare(strict_types=1);

namespace Cake\View\Helper;
use Cake\View\Helper;

class FormataHelper extends Helper{

	public function dateBR($data = null){

		if(empty($data)){
			$data_formatada = null;
		}
		else{
			//$dia = substr($data, 8,2);
			//$mes = substr($data, 5,2);
			//$ano = substr($data, 0,4);
			//$data_formatada = date('d/m/Y', strtotime($data));
			$data_formatada = $data->i18nFormat('dd/M/yyyy');
		}

		return $data_formatada;
	}

	public function cep($cep = null){

		if(empty($cep)){
			$cep_formatado = null;
		}
		else{
			$string_1 = substr($cep, 0,5);
			$string_2 = substr($cep, 5,3);

			$cep_formatado = $string_1."-".$string_2;
		}

		return $cep_formatado;
	}

	public function cnpj($cnpj = null){

		if(empty($cnpj)){
			$cnpj_formatado = null;
		}
		else{
			$cnpj_formatado = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj);
		}

		return $cnpj_formatado;
	}

	public function checkTrueFalse($check = null){

		if($check == 1){
			return true;
		}
		else{
			return false;
		}
	}

	public function checkSimNao($check = null){

		if($check == 1){
			return 'Sim';
		}
		else{
			return 'Não';
		}
	}	

}

?>