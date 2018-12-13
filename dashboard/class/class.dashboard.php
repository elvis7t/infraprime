<?php

session_start();
require_once("../../model/recordset.php");
class dashboard extends recordset {
	var $link;
	var $contagem = array(
		"empresas" 		=> array("tabela"=>"empresas",		"valor", "condic"=>"1"),
		"impostos"		=> array("tabela"=>"irrf",			"valor", "condic"=>"ir_ano='2015'"),
		"usuarios"		=> array("tabela"=>"usuarios",		"valor", "condic"=>"usu_emp_cnpj='49.073.786/0001-66'"),
		"login"			=> array("tabela"=>"logado",		"valor", "condic"=>"1")
	);
	
	function dashboard(){
		$this->link = conecta();
		return $this->link;
	}
	function contagens($tabela){
		$this->FreeSql("SELECT count(*) FROM ".$this->contagem[$tabela]["tabela"]." WHERE ". $this->contagem[$tabela]["condic"]);
		$this->GeraDados();
		$this->contagem[$tabela]["valor"]=$this->fld("count(*)");
			
		return $this->contagem[$tabela]["valor"];
	}
	
}
?>