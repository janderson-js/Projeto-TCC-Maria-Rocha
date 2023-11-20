<?php

include "../dataBase/DataBase.php";
include "../models/HistoricoAtual.php";

class HistoricoAtualDAO{
    private $conn;

    public function __construct(){
        $this->conn = DataBase::getInstance();
    }

    public function inserirHistoricoAtual(HistoricoAtual $historicoAtual){

        $sqlInserirHistoricoAtual = "INSERT INTO historico_atual (data_inicio_sintomas, fatores_desencadeiam_sintomas, 
        nivel_dor, localizacao_dor) VALUES
        (:dataInicioSintomas, :fatoresDesencadeiamSintomas, :nivelDor, :localizacaoDor";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirHistoricoAtual);
            $stmt->bindValue(":dataInicioSintomas", $historicoAtual->getDataInicioSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":fatoresDesencadeiamSintomas", $historicoAtual->getFatoresDesencadeiamSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":nivelDor", $historicoAtual->getNivelDor(), PDO::PARAM_STR);
            $stmt->bindValue(":localizacaoDor", $historicoAtual->getLocalizacaoDor(), PDO::PARAM_STR);

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao inserir Historico Atual:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    
    public function editarHistoricoAtual(HistoricoAtual $historicoAtual){

        $sqlEditarHistoricoAtual = "UPDATE historico_atual SET 
        data_inicio_sintomas=':dataInicioSintomas', 
        fatores_desencadeiam_sintomas=':fatoresDesencadeiamSintomas', 
        nivel_dor=':nivelDor',
        localizacao_dor=':localizacaoDor'
        WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarHistoricoAtual);
            $stmt->bindValue(":dataInicioSintomas", $historicoAtual->getDataInicioSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":fatoresDesencadeiamSintomas", $historicoAtual->getFatoresDesencadeiamSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":nivelDor", $historicoAtual->getNivelDor(), PDO::PARAM_STR);
            $stmt->bindValue(":localizacaoDor", $historicoAtual->getLocalizacaoDor(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $historicoAtual->getId(), PDO::PARAM_INT);

            $stmt->execute();
            

        } catch (\PDOException $e) {
            error_log("Erro ao editar Historico Atual:" . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }

    public function excluirHistoricoAtual(int $id) {
        $sqlExcluirHistoricoAtual = "DELETE FROM historico_atual WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirHistoricoAtual);
            $stmt->bindvalue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
            
        } catch (\PDOException $e) {
            error_log("Erro ao exlcuir o Historico Atual: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
/*
    public function carregaPorIdHistoricoAtual(int $id){

        $sqlCarregaPorIdHistoricoAtual = "SELECT * FROM historico_atual WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregaPorIdHistoricoAtual);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($resul as $row){
                $HistoricoAtual[] = [
                    'id' => $row['id'],
                    'doencasPrevias' => $row['doencas_previas'],
                    'cirurgias' => $row['cirurgias'],
                    'alergias' => $row['alergias'],
                    'medicamentoEmUso' => $row['medicamento_em_uso'],
                    'historicoFamiliarRelevante' => $row['historico_familiar_relevante']
                ];
            }
        return $HistoricoAtual;

        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o Historico Medico: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    
    public function listarHistoricoAtual(){

        $sqlListarHistoricoAtual = "SELECT * FROM historico_atual";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarHistoricoAtual);
            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($resul as $row){
                $historicosMedicos[] = [
                    'id' => $row['id'],
                    'doencasPrevias' => $row['doencas_previas'],
                    'cirurgias' => $row['cirurgias'],
                    'alergias' => $row['alergias'],
                    'medicamentoEmUso' => $row['medicamento_em_uso'],
                    'historicoFamiliarRelevante' => $row['historico_familiar_relevante']
                ];
            }
        return $historicosMedicos;

        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o HistoricoAtual: " . $e->getMessage());
        }finally{
            $this->conn->desconectar();
        }
    }
    */
}