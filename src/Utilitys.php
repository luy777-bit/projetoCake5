<?php
declare(strict_types=1);

namespace App;

class Utilitys{

	public function verificaNull($dado, $nome_campo){

		if(empty($dado)){
			echo "Não foi possivel salvar <br>";
			echo $nome_campo . "Obrigatorio **";
			exit;
		}

		return trim($dado);
	}

	public function formataCNPJinsert($cnpj, $nome_campo){

		if(empty($cnpj)){
			echo "Não foi possivel salvar <br>";
			echo $nome_campo . "Obrigatorio **";
			exit;			
		}
		else{
			$cnpj = str_replace(['-', '.', '/'], "", $cnpj);

			if(strlen($cnpj) != 14){
				echo "Não foi possivel salvar <br>";
				echo $nome_campo . "Invalido **";
				exit;				
			}
		}

		return trim($cnpj);
	}

	public function formataCEPinsert($cep, $nome_campo){

		if(empty($cep)){
			echo "Não foi possivel salvar <br>";
			echo $nome_campo . "Obrigatorio **";
			exit;			
		}
		else{
			$cep = str_replace(['-'], "", $cep);

			if(strlen($cep) != 8){
				echo "Não foi possivel salvar <br>";
				echo $nome_campo . "Invalido **";
				exit;				
			}
		}

		return trim($cep);
	}	

	public function checkboxSimNao($check, $nome_campo){

		if(empty($check)){
			$check = 'N';
		}
		else{
			$check = 'S';
		}

		return trim($check);
	}

	public function checkboxUmOuZero($check, $nome_campo){

		if(empty($check)){
			$check = 0;
		}
		else{
			$check = 1;
		}

		return $check;
	}	

	public function formataDataInsert($data, $nome_campo){
		
		if(empty($data)){
			echo "Não foi possivel salvar <br>";
			echo $nome_campo . "Obrigatorio **";
			exit;
		}
		else{
			$data = str_replace("/", "-", $data);
			if(strlen($data) == 10){
				$dia = substr($data, 0, 2);
				$mes = substr($data, 3, 2);
				$ano = substr($data, 6, 4);

				$data_format = $ano.'-'.$mes.'-'.$dia;
				//echo $ano;exit;
			}
			else{
				echo "Não foi possivel salvar <br>";
				echo $nome_campo . "INVALIDO **";
				exit;				
			}
		}
		return trim($data_format);
	}

	public function dataHoraAtual(){

		return date('Y-m-d H:i:s');
	}

	public function usuarioSession(){

		return 'Luis.Macedo';
	}	
}

?>