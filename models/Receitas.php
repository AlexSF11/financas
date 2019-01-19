<?php
class Receitas extends model {

    public function addReceitas($descricao, $valor, $data, $categoria, $conta) {
		$array = array();


		$sql = $this->db->prepare("INSERT INTO receitas SET descricao = :descricao, id_usuario = :id_usuario, valor = :valor, data = :data, cat_receitas = :cat_receitas, id_conta = :id_conta");
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":id_usuario", $_SESSION['fLogin']);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":data", $data);
		$sql->bindValue(":cat_receitas", $categoria);
		$sql->bindValue(":id_conta", $conta);
		$sql->execute();

		return $array;
	}

    public function getReceitas() {
        $array = array();

        $sql = $this->db->prepare("SELECT 
        receitas.id, receitas.descricao, receitas.valor, receitas.data, contas.titulo 
        FROM receitas 
        INNER JOIN contas 
        ON receitas.id_conta = contas.id 
        WHERE receitas.id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $_SESSION['fLogin']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}