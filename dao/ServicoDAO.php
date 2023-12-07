<?php
include_once(dirname(__FILE__) . "/../dataBase/DataBase.php");
include_once(dirname(__FILE__) . "/../models/Servico.php");

class ServicoDAO {
    private $conn;

    public function __construct() {
        $this->conn = DataBase::getInstance();
    }

    public function inserirServico(Servico $servico) {
        $sqlInserirServico = "INSERT INTO servicos (nome, descricao) VALUES (:nome, :descricao)";

        try {
            if($this->conn->getConexao() === null){
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlInserirServico);
            $stmt->bindValue(":nome", $servico->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $servico->getDescricao(), PDO::PARAM_STR);

            $stmt->execute();
            
        } catch (\PDOException $e) {
            echo("Erro ao inserir o serviço: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function editarServico(Servico $servico) {
        $sqlAtualizarServico = "UPDATE servicos SET nome=:nome, descricao=:descricao WHERE id=:id";

        try {
            if($this->conn->getConexao() === null){
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlAtualizarServico);
            $stmt->bindValue(":id", $servico->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":nome", $servico->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $servico->getDescricao(), PDO::PARAM_STR);

            $stmt->execute();
            
        } catch (\PDOException $e) {
            echo("Erro ao atualizar o serviço: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function excluirServico(int $id) {
        $sqlExcluirServico = "DELETE FROM servicos WHERE id=:id";

        try {
            if($this->conn->getConexao() === null){
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirServico);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();
            
        } catch (\PDOException $e) {
            echo("Erro ao excluir o serviço: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function carregaPorIdServico(int $id){

        $sqlCarregaPorIdServico = "SELECT * FROM servicos WHERE id=:id";

        try {
            if($this->conn->getConexao() === null){
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlCarregaPorIdServico);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $resul = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $servico = new Servico();
            $servico->setId($resul['id']);
            $servico->setNome($resul['nome']);
            $servico->setDescricao($resul['descricao']);
            
            return $servico;

        } catch (\PDOException $e) {
            echo("Erro ao carregar por id o serviço: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function carregaPorIdServicoJson(int $id){

        $sqlCarregaPorIdServico = "SELECT * FROM servicos WHERE id=:id";

        try {
            if($this->conn->getConexao() === null){
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlCarregaPorIdServico);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $resul = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $servico = new Servico();
            $servico->setId($resul['id']);
            $servico->setNome($resul['nome']);
            $servico->setDescricao($resul['descricao']);
            
            header('Content-Type: application/json');
            echo json_encode($servico->toJson(), JSON_UNESCAPED_UNICODE);

        } catch (\PDOException $e) {
            echo("Erro ao carregar por id o serviço: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    
    public function listarServicos(){

        $sqlListarServicos = "SELECT * FROM servicos";

        try {
            if($this->conn->getConexao() === null){
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlListarServicos);
            $stmt->execute();

            $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $listaServicos = [];
            foreach($resul as $res){
                $servico = new Servico();
                $servico->setId($res['id']);
                $servico->setNome($res['nome']);
                $servico->setDescricao($res['descricao']);
                $listaServicos[] = $servico;
            }
            
            return $listaServicos;

        } catch (\PDOException $e) {
            echo("Erro ao listar os serviços: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function listarServicosJson(){

        $sqlListarServicos = "SELECT * FROM servicos";

        try {
            if($this->conn->getConexao() === null){
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlListarServicos);
            $stmt->execute();

            $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $listaServicos = [];
            foreach($resul as $res){
                $servico = new Servico();
                $servico->setId($res['id']);
                $servico->setNome($res['nome']);
                $servico->setDescricao($res['descricao']);
                $listaServicos[] = $servico->toJson();
            }
            
            header('Content-Type: application/json');
            echo json_encode($listaServicos, JSON_UNESCAPED_UNICODE);

        } catch (\PDOException $e) {
            echo("Erro ao listar os serviços: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
}
