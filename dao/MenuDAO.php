<?php

include "../dataBase/DataBase.php";
include "../models/Menu.php";

class MenuDAO{
    private $conn;

    public function __construct(){
        $this->conn = DataBase::getInstance();
    }

    public function inserirMenu(Menu $menu){

        $sqlInserirMenu = "INSERT INTO menu (titulo, descricao, url) VALUES
        (:titulo, :descricao, :url)";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirMenu);
            $stmt->bindValue(":titulo", $menu->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $menu->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(":url", $menu->getUrl(), PDO::PARAM_STR);

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao inserir Menu:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function editarMenu(Menu $menu){

        $sqlInserirMenu = "UPDATE menu SET 
        titulo=':titulo', 
        descricao=':descricao',
        url=':url'
        WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirMenu);
            $stmt->bindValue(":titulo", $menu->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $menu->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(":url", $menu->getUrl(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $menu->getUrl(), PDO::PARAM_INT);

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao editar Menu:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
}