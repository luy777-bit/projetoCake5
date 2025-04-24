<?php
declare(strict_types=1);

namespace App;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Upload{

	public function uploadArquivo($nm_pasta){

		if($_FILES != array()){
			$_FILES['arquivo']['name'] = trim($_FILES['arquivo']['name']);

			$_UP['pasta'] = '.\\..\\tmp\\'.$nm_pasta.'\\';

			$_UP['tamanho'] = 1024 * 1024 * 10;

			$_UP['extensoes'] = array('xls', 'xlsx', 'csv', 'txt');

			$_UP['renomeia'] = false;

			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo de UPLOAD é maior do que o limite';
			$_UP['erros'][2] = 'O arquivo ultrapassou o limite de tamanho especifico no HTML';
			$_UP['erros'][3] = 'O UPLOAD foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o UPLOAD'; 

			if($_FILES['arquivo']['error'] != 0){
				die("Não foi possivel fazer o UPLOAD: <br>" . $_UP['erros'][4]);
				exit;
			}

			$contador_extensao = count(explode('.', $_FILES['arquivo']['name']));
			$get_extensao = explode('.', $_FILES['arquivo']['name']);
			$extensao = $get_extensao[$contador_extensao-1];

			if(array_search($extensao, $_UP['extensoes']) == false){
				$mensagem = "Porfavor, envie arquivos com as seguientes extensoes: xls, xlsx, csv, txt";
				echo $mensagem;
				exit;
			}
			else if($_UP['tamanho'] < $_FILES['arquivo']['size']){
				$mensagem = "O Arquivo enviado é muitp grande";
				echo $mensagem;
				exit;
			}
			else if($_UP['renomeia'] == true){
				$nm_arquivo = time();
			}
			else{
				$nm_arquivo = $_FILES['arquivo']['name'];
			}

			if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nm_arquivo)){

				if($extensao == 'csv'){

					$file = fopen('.\\..\\tmp\\'.$nm_pasta.'\\'.$nm_arquivo, 'r');

					$dados_arquivo = array();
					//while(($line = fgetcsv($file, 999999, "\n")) !== false){
					while(($line = fgetcsv($file, 999999, ";")) !== false){
						$dados_arquivo = $line;
					}

				}
				else if($extensao == 'xls'){

					$file = '.\\..\\tmp\\'.$nm_pasta.'\\'.$nm_arquivo;

					$spreadsheet = new Spreadsheet();

					$reader = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
					$worksheet = $reader->getActiveSheet();
					$dados_arquivo = $worksheet->toArray();				

				}

					echo "<pre>";
					print_r($dados_arquivo);
					exit;					
			}
		}
	}	
}

?>