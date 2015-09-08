<?php

// Inclusion del Motor de Templates Smarty
	REQUIRE_ONCE('libs/smarty-3.1.27/Smarty.class.php');

// Definicion de la Vista Principal
	class MainView{
		private $smarty;

		function __construct(){
			$this->smarty = new Smarty;
		}

		function showHome(){
			$this->smarty->display('index.tpl');
		}
	}
?>