<?php
class loginController extends controller {

	public function index() {
		$dados = array();

		if(isset($_POST['email']) && !empty($_POST['email'])) {
			$email = addslashes($_POST['email']);
			$senha = addslashes($_POST['senha']);

			$u = new Usuarios();
			if($u->login($email, $senha)) {
				header('Location: '.URL);
				exit;
			} else {
				$dados['erro'] = 'E-mail e/ou senha errados.';
			}
		}	

		$this->loadView('login', $dados);	
	}

	public function cadastrar() {
		$dados = array();

		if(isset($_POST['email']) && !empty($_POST['email'])) {
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$senha = md5($_POST['senha']);

			$u = new Usuarios();
			$dados['erro'] = $u->cadastrar($nome, $email, $senha);
		}
		$this->loadTemplate('cadastrar', $dados);
	}

	public function sair() {
		unset($_SESSION['fLogin']);
		header("Location: ".URL);
	}

}