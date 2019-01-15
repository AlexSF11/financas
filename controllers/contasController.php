<?php
class contasController extends controller {

	public function __construct() {
        parent::__construct();
    }
    
	public function index() {
		$dados = array();

		$c = new Contas();
		$dados['contas'] = $c->minhasContas();

		$this->loadTemplate('contas', $dados);
	}

	public function add() {
		$dados = array();

		
		if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
			$titulo = addslashes($_POST['titulo']);
			$tipo = addslashes($_POST['tipo']);
			$valor = addslashes($_POST['valor']);

			$c = new Contas();
			$dados['erro'] = $c->addConta($titulo, $valor, $tipo);



			header("Location: ".URL."/contas");
		}	


		$this->loadTemplate('abrirconta', $dados);
	}

	public function edit($id) {
		$dados = array();

		$c = new Contas();

		if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
			$titulo = addslashes($_POST['titulo']);
			$tipo = addslashes($_POST['tipo']);
			$valor = addslashes($_POST['valor']);
			
			$valor = number_format($valor, 2, '.', ',');

			$dados['erro'] = $c->edit($id, $titulo, $valor, $tipo);

			

			header("Location: ".URL."/contas");
		}


		$dados['contas'] = $c->getInfo($id);

		$this->loadTemplate('contas_edit', $dados);
	}

	public function delete($id) {
		$array = array();

		if(!empty($id)) {
			$id = addslashes($id);

			$c = new Contas();
			$c->del($id);
		}

		header("Location: ".URL."/contas");
	}
}