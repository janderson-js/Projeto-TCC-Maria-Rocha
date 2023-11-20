<?php

include "../dataBase/DataBase.php";
include "../models/Perfil.php";

class PerfilDAO{
    private $conn;

    public function __construct(){
        $this->conn = DataBase::getInstance();
    }

    public function inserirPerfil(Perfil $perfil){

        $sqlInserirPerfil = "INSERT INTO Perfil (titulo, descricao, url) VALUES
        (:titulo, :descricao, :url)";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirPerfil);
            $stmt->bindValue(":titulo", $perfil->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $perfil->getDescricao(), PDO::PARAM_STR);

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao inserir Perfil:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    
}