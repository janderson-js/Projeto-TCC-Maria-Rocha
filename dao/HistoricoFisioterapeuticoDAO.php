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
            error_log("Erro ao inserir Historico Fisioterapeutico:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    
    public function editarHistoricoMedico(HisotoricoFisioterapeutico $historicoFisioterapeutico){

        $sqlEditarHistoricoFisioterapeutico = "UPDATE historico_fisioterapeutico SET 
        tratamento_anterior=':tratamento_anterior',
        motivo_tratamento_anterior=':motivo_tratamento_anterior',
        resultado_tratamento_anterior='resultado_tratamento_anterior',
        problema_fisico_recorrente='problema_fisico_recorrente'
        WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarHistoricoFisioterapeutico);
            $stmt->bindValue(":tratamento_anterior", $historicoFisioterapeutico->getTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":motivo_tratamento_anterior", $historicoFisioterapeutico->getMotivoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":resultado_tratamento_anterior", $historicoFisioterapeutico->getResultadoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":problema_fisico_recorrente", $historicoFisioterapeutico->getProblemaFisicoRecorrente(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $historicoFisioterapeutico->getId(), PDO::PARAM_INT);

            $stmt->execute();           

        } catch (\PDOException $e) {
            error_log("Erro ao editar Historico Medico:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
}