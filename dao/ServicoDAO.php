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

    public function carregaPorIdServico(int $id){

        $sqlCarregaPorIdServico = "SELECT * FROM servico WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregaPorIdServico);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $resul = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $servico = new Servico();
            $servico->setId($resul['id']);
            $servico->setNome($resul['nome']);
            $servico->setDescricao($resul['descricao']);
            $servico->setTipo($resul['tipo']);
            
            return $servico;

        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o serviço: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    
    public function listarServicos(){

        $sqlListarServicos = "SELECT * FROM servico";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarServicos);
            $stmt->execute();

            $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $listaServicos = [];
            foreach($resul as $res){
                $servico = new Servico();
                $servico->setId($res['id']);
                $servico->setNome($res['nome']);
                $servico->setDescricao($res['descricao']);
                $servico->setTipo($res['tipo']);
                $listaServicos[] = $servico;
            }
            
            return $listaServicos;

        } catch (\PDOException $e) {
            error_log("Erro ao listar os serviços: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
}
