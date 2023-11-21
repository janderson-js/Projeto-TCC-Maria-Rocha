<?php

include "../dataBase/DataBase.php";
include "../models/HistoricoFisioterapeutico.php";

class HistoricoFisioterapeuticoDAO{
    private $conn;

    public function __construct(){
        $this->conn = DataBase::getInstance();
    }

    public function inserirHistoricoFisioterapeutico(HisotoricoFisioterapeutico $historicoFisioterapeutico){

        $sqlInserirHistoricoFisioterapeutico = "INSERT INTO historico_fisioterapeutico (tratamento_anterior, motivo_tratamento_anterior,
         resultado_tratamento_anterior, problema_fisico_recorrente) VALUES
        (:tratamento_anterior, :motivo_tratamento_anterior, :resultado_tratamento_anterior,
         :problema_fisico_recorrente)";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirHistoricoFisioterapeutico);
            $stmt->bindValue(":tratamento_anterior", $historicoFisioterapeutico->getTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":motivo_tratamento_anterior", $historicoFisioterapeutico->getMotivoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":resultado_tratamento_anterior", $historicoFisioterapeutico->getResultadoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":problema_fisico_recorrente", $historicoFisioterapeutico->getProblemaFisicoRecorrente(), PDO::PARAM_STR);
            

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao inserir HistoricoFisioterapeutico:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    
  
}