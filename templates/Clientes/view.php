<?php

	$html = null;
	foreach($pesquisa_array as $key => $value){

		$html .= "<b>Cliente: </b>" . $value->nm_cliente;
		$html .= "<br>";
		$html .= "<b>CNPJ: </b>" . $value->cnpj;
		$html .= "<br>";
		$html .= "<b>Endereço: </b>" . $value->endereco;
		$html .= "<br>";
		$html .= "<b>CEP: </b>" . $value->cep;
		$html .= "<br>";
		$html .= "<b>OBS.: </b>" . $value->observacao;
		$html .= "<br>";
		$html .= "<b>Ativo: </b>" . $value->ativo;
		$html .= "<br>";
		$html .= "<b>Vencimento: </b>" . $value->data_vencimento;
		$html .= "<br>";

		echo $html;
		exit;												
	}

?>