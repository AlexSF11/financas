<?php

class addtransfController extends controller {

	public function __construct() {
        parent::__construct();
    }

	public function index() {
		$dados = array();

		$this->loadTemplate('addtransferencia', $dados);
	}
}
