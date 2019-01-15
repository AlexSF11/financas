<?php
class Despesas extends model {

	public function addDespesas($descricao, $despesas_valor, $data, $categoria, $despesas_conta) {
		$array = array();


		$sql = $this->db->prepare("INSERT INTO despesas SET descricao = :descricao, id_usuario = :id_usuario, despesas_valor = :despesas_valor, data = :data, id_categoria = :id_categoria, id_conta = :id_conta");
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":id_usuario", $_SESSION['fLogin']);
		$sql->bindValue(":despesas_valor", $despesas_valor);
		$sql->bindValue(":data", $data);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_conta", $despesas_conta);
		$sql->execute();


		return $array;
	}
	public function editDespesas($descricao, $despesas_valor, $categoria, $despesas_conta, $id) {
		$sql = $this->db->prepare("UPDATE despesas SET descricao = :descricao, despesas_valor = :despesas_valor, id_categoria = :id_categoria, id_conta = :id_conta  WHERE id = :id");

		
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":despesas_valor", $despesas_valor);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_conta", $despesas_conta);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function del($id) {
		$sql = $this->db->prepare("DELETE FROM despesas WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function getNomeConta() {
		$array = array();


		$sql = $this->db->prepare("SELECT titulo FROM contas WHERE id_usuario = :id_usuario");
		$sql->bindValue(":id_usuario", $_SESSION['fLogin']);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		} 

		return $array;
	} 

	public function getDespesas() {
		$array = array();

		$sql = $this->db->prepare("SELECT despesas.id, despesas.descricao, despesas.data, despesas.despesas_valor, contas.titulo FROM despesas INNER JOIN contas ON despesas.id_conta = contas.id WHERE despesas.id_usuario = :id_usuario");
		$sql->bindValue(":id_usuario", $_SESSION['fLogin']);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getInfo($id) {
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM despesas WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}
}