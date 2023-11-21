<?php

include "../dataBase/DataBase.php";
include "../models/Perfil.php";

class PerfilDAO{
    private $conn;

    public function __construct(){
        $this->conn = DataBase::getInstance();
    }

    public function inserirPerfil(Perfil $perfil){

        $sqlInserirPerfil = "INSERT INTO perfil (titulo, descricao) VALUES
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

    public function excluirPerfil(int $id) {
        $sqlExcluirPerfil = "DELETE FROM perfil WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirPerfil);
            $stmt->bindvalue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
            
        } catch (\PDOException $e) {
            error_log("Erro ao exlcuir o Perfil: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function carregaPorIdPerfil(int $id){

        $sqlCarregaPorIdPerfil = "SELECT * FROM perfil WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregaPorIdPerfil);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($resul as $row){
                $perfil[] = [
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'descricao' => $row['descricao']
                ];
            }
        return $perfil;

        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o Perfil: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    
    public function listarPerfil(){

        $sqlListarPerfil = "SELECT * FROM perfil";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarPerfil);
            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($resul as $row){
                $perfis[] = [
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'descricao' => $row['descricao'],
                ];
            }
        return $perfis;

        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o Perfil: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
}