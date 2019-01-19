<?php
class catReceitas extends model {
    public function getList() {
        $array = array();

        $sql = $this->db->query("SELECT * FROM cat_receitas");
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}