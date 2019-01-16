<?php
class receitasController extends controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $this->loadTemplate('receitas', $dados);
    }
}