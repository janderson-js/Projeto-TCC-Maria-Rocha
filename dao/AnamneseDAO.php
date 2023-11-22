<?php

include "../dataBase/DataBase.php";
include "../models/Anamnese.php";

class AnamneseDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = DataBase::getInstance();
    }

    public function inserirAnamnese(Anamnese $anamnese)
    {
        $sqlInserirAnamnese = "INSERT INTO anamnese (
            data_inicio_sintomas, fatores_desencadeiam_sintomas, nivel_dor, localizacao_dor,
            tratamento_anterior, motivo_tratamento_anterior, resultado_tratamento_anterior,
            problema_fisico_recorrente, doencas_previas, cirurgias, alergias, medicamento_em_uso,
            historico_familiar_relevante
        ) VALUES (
            :dataInicioSintomas, :fatoresDesencadeiamSintomas, :nivelDor, :localizacaoDor,
            :tratamentoAnterior, :motivoTratamentoAnterior, :resultadoTratamentoAnterior,
            :problemaFisicoRecorrente, :doencasPrevias, :cirurgias, :alergias, :medicamentoEmUso,
            :historicoFamiliarRelevante
        )";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirAnamnese);
            $stmt->bindValue(":dataInicioSintomas", $anamnese->getDataInicioSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":fatoresDesencadeiamSintomas", $anamnese->getFatoresDesencadeiamSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":nivelDor", $anamnese->getNivelDor(), PDO::PARAM_INT);
            $stmt->bindValue(":localizacaoDor", $anamnese->getLocalizacaoDor(), PDO::PARAM_STR);
            $stmt->bindValue(":tratamentoAnterior", $anamnese->getTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":motivoTratamentoAnterior", $anamnese->getMotivoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":resultadoTratamentoAnterior", $anamnese->getResultadoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":problemaFisicoRecorrente", $anamnese->getProblemaFisicoRecorrente(), PDO::PARAM_STR);
            $stmt->bindValue(":doencasPrevias", $anamnese->getDoencasPrevias(), PDO::PARAM_STR);
            $stmt->bindValue(":cirurgias", $anamnese->getCirurgias(), PDO::PARAM_STR);
            $stmt->bindValue(":alergias", $anamnese->getAlergias(), PDO::PARAM_STR);
            $stmt->bindValue(":medicamentoEmUso", $anamnese->getMedicamentoEmUso(), PDO::PARAM_STR);
            $stmt->bindValue(":historicoFamiliarRelevante", $anamnese->getHistoricoFamiliarRelevante(), PDO::PARAM_STR);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao inserir anamnese: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function editarAnamnese(Anamnese $anamnese)
    {
        $sqlEditarAnamnese = "UPDATE anamnese SET 
            data_inicio_sintomas=:dataInicioSintomas, 
            fatores_desencadeiam_sintomas=:fatoresDesencadeiamSintomas, 
            nivel_dor=:nivelDor, 
            localizacao_dor=:localizacaoDor,
            tratamento_anterior=:tratamentoAnterior, 
            motivo_tratamento_anterior=:motivoTratamentoAnterior, 
            resultadoTratamentoAnterior=:resultadoTratamentoAnterior,
            problemaFisicoRecorrente=:problemaFisicoRecorrente, 
            doencasPrevias=:doencasPrevias, 
            cirurgias=:cirurgias, 
            alergias=:alergias, 
            medicamentoEmUso=:medicamentoEmUso,
            historicoFamiliarRelevante=:historicoFamiliarRelevante
            WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarAnamnese);
            $stmt->bindValue(":dataInicioSintomas", $anamnese->getDataInicioSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":fatoresDesencadeiamSintomas", $anamnese->getFatoresDesencadeiamSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":nivelDor", $anamnese->getNivelDor(), PDO::PARAM_INT);
            $stmt->bindValue(":localizacaoDor", $anamnese->getLocalizacaoDor(), PDO::PARAM_STR);
            $stmt->bindValue(":tratamentoAnterior", $anamnese->getTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":motivoTratamentoAnterior", $anamnese->getMotivoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":resultadoTratamentoAnterior", $anamnese->getResultadoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":problemaFisicoRecorrente", $anamnese->getProblemaFisicoRecorrente(), PDO::PARAM_STR);
            $stmt->bindValue(":doencasPrevias", $anamnese->getDoencasPrevias(), PDO::PARAM_STR);
            $stmt->bindValue(":cirurgias", $anamnese->getCirurgias(), PDO::PARAM_STR);
            $stmt->bindValue(":alergias", $anamnese->getAlergias(), PDO::PARAM_STR);
            $stmt->bindValue(":medicamentoEmUso", $anamnese->getMedicamentoEmUso(), PDO::PARAM_STR);
            $stmt->bindValue(":historicoFamiliarRelevante", $anamnese->getHistoricoFamiliarRelevante(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $anamnese->getId(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao editar anamnese: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function excluirAnamnese(int $id)
    {
        $sqlExcluirAnamnese = "DELETE FROM anamnese WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirAnamnese);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao excluir a anamnese: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function carregarPorIdAnamnese(int $id)
    {
        $sqlCarregarPorIdAnamnese = "SELECT * FROM anamnese WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdAnamnese);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return null; // Anamnese não encontrada
            }

            $anamnese = new Anamnese();
            $anamnese->setId($result['id']);
            $anamnese->setDataInicioSintomas($result['dataInicioSintomas']);
            $anamnese->setFatoresDesencadeiamSintomas($result['fatoresDesencadeiamSintomas']);
            $anamnese->setNivelDor($result['nivelDor']);
            $anamnese->setLocalizacaoDor($result['localizacaoDor']);
            $anamnese->setTratamentoAnterior($result['tratamentoAnterior']);
            $anamnese->setMotivoTratamentoAnterior($result['motivoTratamentoAnterior']);
            $anamnese->setResultadoTratamentoAnterior($result['resultadoTratamentoAnterior']);
            $anamnese->setProblemaFisicoRecorrente($result['problemaFisicoRecorrente']);
            $anamnese->setDoencasPrevias($result['doencasPrevias']);
            $anamnese->setCirurgias($result['cirurgias']);
            $anamnese->setAlergias($result['alergias']);
            $anamnese->setMedicamentoEmUso($result['medicamentoEmUso']);
            $anamnese->setHistoricoFamiliarRelevante($result['historicoFamiliarRelevante']);

            return $anamnese;
        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id a anamnese: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function listarAnamneses(){
    $sqlListarAnamneses = "SELECT * FROM anamnese";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarAnamneses);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $anamneses = [];

            foreach ($result as $row) {
                $anamnese = new Anamnese();
                $anamnese->setId($row['id']);
                $anamnese->setDataInicioSintomas($row['dataInicioSintomas']);
                $anamnese->setFatoresDesencadeiamSintomas($row['fatoresDesencadeiamSintomas']);
                $anamnese->setNivelDor($row['nivelDor']);
                $anamnese->setLocalizacaoDor($row['localizacaoDor']);
                $anamnese->setTratamentoAnterior($row['tratamentoAnterior']);
                $anamnese->setMotivoTratamentoAnterior($row['motivoTratamentoAnterior']);
                $anamnese->setResultadoTratamentoAnterior($row['resultadoTratamentoAnterior']);
                $anamnese->setProblemaFisicoRecorrente($row['problemaFisicoRecorrente']);
                $anamnese->setDoencasPrevias($row['doencasPrevias']);
                $anamnese->setCirurgias($row['cirurgias']);
                $anamnese->setAlergias($row['alergias']);
                $anamnese->setMedicamentoEmUso($row['medicamentoEmUso']);
                $anamnese->setHistoricoFamiliarRelevante($row['historicoFamiliarRelevante']);

                $anamneses[] = $anamnese;
            }

            return $anamneses;
        } catch (\PDOException $e) {
            error_log("Erro ao listar anamneses: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
}