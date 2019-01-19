<?php
class despesasController extends controller {

	public function __construct() {
        parent::__construct();
    }

	public function index() {
		$dados = array();

		$d = new Despesas();

		$dados['conta'] = $d->getNomeConta();
		$dados['despesas'] = $d->getDespesas();

		$this->loadTemplate('despesas', $dados);
	}

	public function add($id) {
		$dados = array();

		$c = new Categorias();
		$contas = new Contas();
		$d = new Despesas();
		
		if(isset($_POST['descricao']) && !empty($_POST['descricao'])) {
			$descricao = addslashes($_POST['descricao']);
			$despesas_valor = addslashes($_POST['despesas_valor']);
			$data = addslashes($_POST['data']);
			$categoria = addslashes($_POST['categoria']);
			$despesas_conta = addslashes($_POST['despesas_conta']);

		

			//Puxando o valor antigo da conta
			$valor = $contas->getValor($despesas_conta);

			//Inserindo a nova despesa
			$d->addDespesas($descricao, $despesas_valor, $data, $categoria, $despesas_conta);

			//Atualizando o valor da conta, depois de inserir uma nova despesa
			$valor = $valor - $despesas_valor;
			$contas->updateValor($despesas_conta, $valor);
			

		}

		$dConta = $contas->getNome();
		$categorias = $c->getList();

		$dados['categorias'] = $categorias;
		$dados['dConta'] = $dConta;

		$this->loadTemplate('despesas_add', $dados);
	}

	public function edit($id) {
		$dados = array();

		$c = new Categorias();
		$contas = new Contas();
		$d = new Despesas();

		$conta_atual = $d->contaId($id);

		$valor_atual = $contas->valorAtual($conta_atual);

		if(isset($_POST['descricao']) && !empty($_POST['descricao'])) {
			$descricao = addslashes($_POST['descricao']);
			$despesas_valor = addslashes($_POST['despesas_valor']);
			$categoria = addslashes($_POST['categoria']);
			$despesas_conta = addslashes($_POST['despesas_conta']);

			$despesas_valor = number_format($despesas_valor, 2, '.', ',');

			if($conta_atual != $despesas_conta) {
				$valor_atual = $valor_atual + $despesas_valor;
				$contas->updateValor($conta_atual, $valor_atual);
			}

			//Puxando o valor antigo da conta
			$valor = $contas->getValor($despesas_conta);

			//Inserindo a nova despesa
			$d->editDespesas($descricao, $despesas_valor, $categoria, $despesas_conta, $id);

			//Atualizando o valor da conta, depois de inserir uma nova despesa
			$valor = $valor - $despesas_valor;
			$contas->updateValor($despesas_conta, $valor);
			
			header("Location: ".URL."/despesas");
		}

		$dados['despesas'] = $d->getInfo($id);
		$dados['categorias'] = $c->getList();
		$dados['dConta'] = $contas->minhasContas();


		$this->loadTemplate('despesas_edit', $dados);
	}

	public function delete($id) {
		$array = array();

		if(!empty($id)) {
			$d = new Despesas();

			$d->del($id);
		}

		header("Location: ".URL."/despesas");
	}
}