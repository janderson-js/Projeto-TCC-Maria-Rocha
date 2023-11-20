<?php

include "../dataBase/DataBase.php";
include "../models/Especialidade.php";

class EspecialidadeDAO{
    private $conn;

    public function __construct(){
        $this->conn = DataBase::getInstance();
    }

    public function inserirEspecialidade(Especialidade $especialidade){

        $sqlInserirEspecialidade = "INSERT INTO especialidade (titulo, descricao) VALUES
        (:titulo, :descricao)";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirEspecialidade);
            $stmt->bindValue(":titulo", $especialidade->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $especialidade->getDescricao(), PDO::PARAM_STR);

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao inserir Especialidade:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function editarEspecialidade(Especialidade $especialidade){

        $sqlEditarEspecialidade = "UPDATE especialidade SET 
        titulo=':titulo', 
        descricao=':descricao',
        WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarEspecialidade);
            $stmt->bindValue(":titulo", $especialidade->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $especialidade->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $especialidade->getId(), PDO::PARAM_INT);

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao editar Especialidade:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

}