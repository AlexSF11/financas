<?php
class homeController extends controller {

	public function __construct() {
        parent::__construct();

        $u = new Usuarios();
        if($u->isLogged() == false) {
        	header("Location: ".URL."/login");
            exit;
        }
    }

	public function index() {
		$dados = array();

		$this->loadTemplate('home', $dados);
	}

}