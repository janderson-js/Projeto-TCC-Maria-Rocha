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

    public function excluirEspecialidade(int $id) {
        $sqlExcluirEspecialidade = "DELETE FROM especialidade WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirEspecialidade);
            $stmt->bindvalue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
            
        } catch (\PDOException $e) {
            error_log("Erro ao exlcuir o Especialidade: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function carregaPorIdEspecialidade(int $id){

        $sqlCarregaPorIdEspecialidade = "SELECT * FROM especialidade WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregaPorIdEspecialidade);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($resul as $row){
                $especialidade[] = [
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'descricao' => $row['descricao']
                ];
            }
        return $especialidade;

        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o Especialidade: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    
    public function listarEspecialidade(){

        $sqlListarEspecialidade = "SELECT * FROM especialidade";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarEspecialidade);
            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($resul as $row){
                $especialidades[] = [
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'descricao' => $row['descricao'],
                ];
            }
        return $especialidades;

        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o Especialidade: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
}