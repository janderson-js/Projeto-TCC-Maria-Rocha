<?php

include "../dataBase/DataBase.php";
include "../models/Perfil.php";

class PerfilDAO{
    private $conn;

    public function __construct(){
        $this->conn = DataBase::getInstance();
    }

    public function inserirPerfil(Perfil $perfil){

        $sqlInserirPerfil = "INSERT INTO perfil (titulo, descricao, url) VALUES
        (:titulo, :descricao, :url)";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirPerfil);
            $stmt->bindValue(":titulo", $perfil->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $perfil->getDescricao(), PDO::PARAM_STR);

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao inserir perfil:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function editarPerfil(Perfil $perfil){

        $sqlEditarPerfil = "UPDATE perfil SET 
        titulo=':titulo', 
        descricao=':descricao',
        WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarPerfil);
            $stmt->bindValue(":titulo", $perfil->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $perfil->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $perfil->getId(), PDO::PARAM_INT);

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao editar Perfil:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    
    
}