<?php
class receitasController extends controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $r = new Receitas();

        $dados['receitas'] = $r->getReceitas();

        $this->loadTemplate('receitas', $dados);
    }

    public function add($id) {
        $dados = array();

        $cat = new catReceitas();
        $c = new Contas();
        $r = new Receitas();

        if(isset($_POST['descricao']) && !empty($_POST['descricao'])) {
			$descricao = addslashes($_POST['descricao']);
			$valor = addslashes($_POST['valor']);
			$data = addslashes($_POST['data']);
			$categoria = addslashes($_POST['categoria']);
			$conta = addslashes($_POST['conta']);

			//Puxando o valor antigo da conta
			$novo_valor = $c->getValor($conta);

			//Inserindo a nova despesa
			$r->addReceitas($descricao, $valor, $data, $categoria, $conta);

			//Atualizando o valor da conta, depois de inserir uma nova despesa
			$novo_valor = $novo_valor + $valor;
			$c->updateValor($conta, $novo_valor);
		}
     
        $dados['categorias'] = $cat->getList();
        $dados['dConta'] = $c->minhasContas();

        $this->loadTemplate('receitas_add', $dados);
    }
}