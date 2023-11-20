<?php

include "../dataBase/DataBase.php";
include "../models/HistoricoMedico.php";

class HistoricoMedicoDAO{
    private $conn;

    public function __construct(){
        $this->conn = DataBase::getInstance();
    }

    public function inserirHistoricoMedico(HistoricoMedico $historicoMedico){

        $sqlInserirHistoricoMedico = "INSERT INTO historico_medico (doencas_previas, cirurgias, alergias, medicamento_em_uso, historico_familiar_relevante) VALUES
        (:doencas_previas, :cirurgias, :alergias, :medicamento_em_uso, :historico_familiar_relevante)";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirHistoricoMedico);
            $stmt->bindValue(":doencas_previas", $historicoMedico->getDoencasPrevias(), PDO::PARAM_STR);
            $stmt->bindValue(":cirurgias", $historicoMedico->getCirurgias(), PDO::PARAM_STR);
            $stmt->bindValue(":alergias", $historicoMedico->getAlergias(), PDO::PARAM_STR);
            $stmt->bindValue(":medicamento_em_uso", $historicoMedico->getMedicamentoEmUso(), PDO::PARAM_STR);
            $stmt->bindValue(":historico_familiar_relevante", $historicoMedico->getHistoricoFamiliarRelevante(), PDO::PARAM_STR);

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao inserir HistoricoMedico:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    
    public function editarHistoricoMedico(HistoricoMedico $historicoMedico){

        $sqlEditarHistoricoMedico = "UPDATE HistoricoMedico SET 
        doencas_previas=':doencasPrevias',
        cirurgias=':cirurgias',
        alergias=':cirurgias',
        medicamento_em_uso=':medicamentoEmUso',
        historico_familiar_relevante=':historicoFamiliarRelevante'
        WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarHistoricoMedico);
            $stmt->bindValue(":doencas_previas", $historicoMedico->getDoencasPrevias(), PDO::PARAM_STR);
            $stmt->bindValue(":cirurgias", $historicoMedico->getCirurgias(), PDO::PARAM_STR);
            $stmt->bindValue(":alergias", $historicoMedico->getAlergias(), PDO::PARAM_STR);
            $stmt->bindValue(":medicamento_em_uso", $historicoMedico->getMedicamentoEmUso(), PDO::PARAM_STR);
            $stmt->bindValue(":historico_familia_relevante", $historicoMedico->getHistoricoFamiliarRelevante(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $historicoMedico->getId(), PDO::PARAM_INT);

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao editar Historico Medico:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
/*
    public function excluirHistoricoMedico(int $id) {
        $sqlExcluirHistoricoMedico = "DELETE FROM HistoricoMedico WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirHistoricoMedico);
            $stmt->bindvalue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
            
        } catch (\PDOException $e) {
            error_log("Erro ao exlcuir o HistoricoMedico: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function carregaPorIdHistoricoMedico(int $id){

        $sqlCarregaPorIdHistoricoMedico = "SELECT * FROM HistoricoMedico WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregaPorIdHistoricoMedico);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($resul as $row){
                $HistoricoMedico[] = [
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'descricao' => $row['descricao']
                ];
            }
        return $HistoricoMedico;

        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o HistoricoMedico: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    
    public function listarHistoricoMedico(){

        $sqlListarHistoricoMedico = "SELECT * FROM HistoricoMedico";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarHistoricoMedico);
            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($resul as $row){
                $HistoricoMedicos[] = [
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'descricao' => $row['descricao'],
                ];
            }
        return $HistoricoMedicos;

        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o HistoricoMedico: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    */
}