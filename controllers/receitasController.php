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

    public function edit($id) {
        $dados = array();

        $cat = new catReceitas();
        $c = new Contas();
        $r = new Receitas();

        $conta_atual = $r->contaId($id);

        $valor_atual = $c->valorAtual($conta_atual);

        if(isset($_POST['descricao']) && !empty($_POST['descricao'])) {
			$descricao = addslashes($_POST['descricao']);
			$valor = addslashes($_POST['valor']);
			$categoria = addslashes($_POST['categoria']);
			$conta = addslashes($_POST['conta']);

            $valor = number_format($valor, 2, '.', ',');

            if($conta_atual != $conta) {
                $valor_atual = $valor_atual - $valor;
                $c->updateValor($conta_atual, $valor_atual);
            }

			//Puxando o valor antigo da conta
			$novo_valor = $c->getValor($conta);

			//Atualizando Despesa
			$r->editReceitas($descricao, $valor, $categoria, $conta, $id);

			//Atualizando o valor da conta, depois de inserir uma nova despesa
			$novo_valor = $novo_valor + $valor;
            $c->updateValor($conta, $novo_valor);

        	header("Location: ".URL."/receitas");
		}

        $dados['receitas'] = $r->getInfo($id);
        $dados['categorias'] = $cat->getList();
        $dados['dConta'] = $c->minhasContas();

        $this->loadTemplate('receitas_edit', $dados);
    }

    public function delete($id) {
		$array = array();

		if(!empty($id)) {
			$r = new Receitas();

			$r->del($id);
		}

		header("Location: ".URL."/receitas");
	}
}