<?php
class Contas extends model {

	public function addConta($titulo, $valor, $tipo) {

		$sql = $this->db->prepare("SELECT id FROM contas WHERE titulo = :titulo");
		$sql->bindValue(":titulo", $titulo);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $this->db->prepare("INSERT INTO contas SET id_usuario = :id_usuario, titulo = :titulo, tipo = :tipo, valor = :valor");
			$sql->bindValue(":id_usuario", $_SESSION['fLogin']);
			$sql->bindValue(":titulo", $titulo);
			$sql->bindValue(":tipo", $tipo);
			$sql->bindValue(":valor", $valor);
			$sql->execute();
			header("Location: ".URL);
		} else {
			return "Esta conta já existe!";
		}
	}

	public function edit($id, $titulo, $valor, $tipo) {
		$sql = $this->db->prepare("UPDATE contas SET titulo = :titulo, valor = :valor, tipo = :tipo WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":tipo", $tipo);
		$sql->execute();
	}

	public function del($id) {
		$sql = $this->db->prepare("DELETE FROM contas WHERE id = :id ");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function updateValor($despesas_conta, $valor) {
		$sql = $this->db->prepare("UPDATE contas SET valor = :valor WHERE id = :id");
		$sql->bindValue(':id', $despesas_conta);
		$sql->bindValue(':valor', $valor);
		$sql->execute();
	}

	public function minhasContas() {
		$array = array();
		$sql = $this->db->prepare("SELECT * FROM contas WHERE id_usuario = :id_usuario");
		$sql->bindValue(":id_usuario", $_SESSION['fLogin']);
		$sql->execute();

		if($sql->rowCount()  > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getInfo($id) {
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM contas WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getNome() {
		$array = array();

		$sql = $this->db->query("SELECT id, titulo FROM contas");
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getValor($despesas_conta) {
	


		$sql = $this->db->prepare("SELECT valor FROM contas WHERE id = :id");
		$sql->bindValue(":id", $despesas_conta);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			return $sql['valor'];
		} 

	}

}