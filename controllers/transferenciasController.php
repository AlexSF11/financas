<?php 
class transferenciasController extends controller {

	public function __construct() {
       parent::__construct();
    }

	public function index() {
		$dados = array();

		$this->loadTemplate('transferencias', $dados);
	}

	public function add() {
		$dados = array();

		$this->loadTemplate('transferencias_add', $dados);
	}


}