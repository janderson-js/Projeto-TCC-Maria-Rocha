<?php
include "../dataBase/DataBase.php";
include "../models/Servico.php";

class ServicoDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function inserirServico(Servico $servico) {
        $sqlInserirServico = "INSERT INTO servico (nome, descricao, tipo) VALUES (:nome, :descricao, :tipo)";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirServico);
            $stmt->bindValue(":nome", $servico->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $servico->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(":tipo", $servico->getTipo(), PDO::PARAM_STR);

            $stmt->execute();
            
        } catch (\PDOException $e) {
            error_log("Erro ao inserir o serviço: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function editarServico(Servico $servico) {
        $sqlAtualizarServico = "UPDATE servico SET nome=:nome, descricao=:descricao, tipo=:tipo WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlAtualizarServico);
            $stmt->bindValue(":id", $servico->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":nome", $servico->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $servico->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(":tipo", $servico->getTipo(), PDO::PARAM_STR);

            $stmt->execute();
            
        } catch (\PDOException $e) {
            error_log("Erro ao atualizar o serviço: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function excluirServico(int $id) {
        $sqlExcluirServico = "DELETE FROM servico WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirServico);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();
            
        } catch (\PDOException $e) {
            error_log("Erro ao excluir o serviço: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    
}
