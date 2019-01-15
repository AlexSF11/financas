<?php
class Usuarios extends model {

	public function isLogged() {
		if(isset($_SESSION['fLogin']) && !empty($_SESSION['fLogin'])) {
			return true;
		} else {
			return false;
		}
	}

	public function login($email, $senha) {

		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {
			$row = $sql->fetch();
			$_SESSION['fLogin'] = $row['id'];
			
			return true;
		} else {
			return false;
		}
	}

	public function cadastrar($nome, $email, $senha) {
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() == 0) {
			$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
			$sql = $this->db->query($sql);

			$id = $this->db->lastInsertId();
			$_SESSION['fLogin'] = $id;
			header("Location: ".URL);
		} else {
			return "E-mail já cadastrado";
		}
	}
}