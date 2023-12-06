<?php

include_once(dirname(__FILE__) . "/../dataBase/DataBase.php");
include_once(dirname(__FILE__) . "/../models/Anamnese.php");

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
            tratamento_anterior, motivo_tratamento_anterior, resultado_tratamento_anterio,
            problema_fisico_recorrente, doencas_previas, cirurgias, alergias, medicamentos_em_uso,
            historico_familiar_relevante, cpf
        ) VALUES (
            :dataInicioSintomas, :fatoresDesencadeiamSintomas, :nivel_dor, :localizacaoDor,
            :tratamentoAnterior, :motivoTratamentoAnterior, :resultado_tratamento_anterio,
            :problemaFisicoRecorrente, :doencasPrevias, :cirurgias, :alergias, :medicamentoEmUso,
            :historicoFamiliarRelevante, :cpf
        )";

        try {

            if ($this->conn->getConexao() === null) {
                $this->conn->reconectar();
            }

            $stmt = $this->conn->getConexao()->prepare($sqlInserirAnamnese);
            $stmt->bindValue(":dataInicioSintomas", $anamnese->getDataInicioSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":fatoresDesencadeiamSintomas", $anamnese->getFatoresDesencadeiamSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":nivel_dor", $anamnese->getNivelDor(), PDO::PARAM_INT);
            $stmt->bindValue(":localizacaoDor", $anamnese->getLocalizacaoDor(), PDO::PARAM_STR);
            $stmt->bindValue(":tratamentoAnterior", $anamnese->getTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":motivoTratamentoAnterior", $anamnese->getMotivoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":resultado_tratamento_anterio", $anamnese->getResultadoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":problemaFisicoRecorrente", $anamnese->getProblemaFisicoRecorrente(), PDO::PARAM_STR);
            $stmt->bindValue(":doencasPrevias", $anamnese->getDoencasPrevias(), PDO::PARAM_STR);
            $stmt->bindValue(":cirurgias", $anamnese->getCirurgias(), PDO::PARAM_STR);
            $stmt->bindValue(":alergias", $anamnese->getAlergias(), PDO::PARAM_STR);
            $stmt->bindValue(":medicamentoEmUso", $anamnese->getMedicamentoEmUso(), PDO::PARAM_STR);
            $stmt->bindValue(":historicoFamiliarRelevante", $anamnese->getHistoricoFamiliarRelevante(), PDO::PARAM_STR);
            $stmt->bindValue(":cpf", $anamnese->getCpf(), PDO::PARAM_STR);

            $stmt->execute();
        } catch (\PDOException $e) {
            echo "Erro ao inserir anamnese: " . $e->getMessage();
        } finally {
            $this->conn->desconectar();
        }
    }

    public function editarAnamnese(Anamnese $anamnese)
    {
        $sqlEditarAnamnese = "UPDATE anamnese SET 
            data_inicio_sintomas=:dataInicioSintomas, 
            fatores_desencadeiam_sintomas=:fatoresDesencadeiamSintomas, 
            nivel_dor=:nivel_dor, 
            localizacao_dor=:localizacaoDor,
            tratamento_anterior=:tratamentoAnterior, 
            motivo_tratamento_anterior=:motivoTratamentoAnterior, 
            resultado_tratamento_anterio=:resultado_tratamento_anterio,
            problema_fisico_recorrente=:problemaFisicoRecorrente, 
            doencas_previas=:doencasPrevias, 
            cirurgias=:cirurgias, 
            alergias=:alergias, 
            medicamentos_em_uso=:medicamentoEmUso,
            historico_familiar_relevante=:historicoFamiliarRelevante,
            cpf=:cpf
            WHERE id=:id";

        try {
            if ($this->conn->getConexao() === null) {
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlEditarAnamnese);
            $stmt->bindValue(":dataInicioSintomas", $anamnese->getDataInicioSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":fatoresDesencadeiamSintomas", $anamnese->getFatoresDesencadeiamSintomas(), PDO::PARAM_STR);
            $stmt->bindValue(":nivel_dor", $anamnese->getNivelDor(), PDO::PARAM_INT);
            $stmt->bindValue(":localizacaoDor", $anamnese->getLocalizacaoDor(), PDO::PARAM_STR);
            $stmt->bindValue(":tratamentoAnterior", $anamnese->getTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":motivoTratamentoAnterior", $anamnese->getMotivoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":resultado_tratamento_anterio", $anamnese->getResultadoTratamentoAnterior(), PDO::PARAM_STR);
            $stmt->bindValue(":problemaFisicoRecorrente", $anamnese->getProblemaFisicoRecorrente(), PDO::PARAM_STR);
            $stmt->bindValue(":doencasPrevias", $anamnese->getDoencasPrevias(), PDO::PARAM_STR);
            $stmt->bindValue(":cirurgias", $anamnese->getCirurgias(), PDO::PARAM_STR);
            $stmt->bindValue(":alergias", $anamnese->getAlergias(), PDO::PARAM_STR);
            $stmt->bindValue(":medicamentoEmUso", $anamnese->getMedicamentoEmUso(), PDO::PARAM_STR);
            $stmt->bindValue(":historicoFamiliarRelevante", $anamnese->getHistoricoFamiliarRelevante(), PDO::PARAM_STR);
            $stmt->bindValue(":cpf", $anamnese->getCpf(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $anamnese->getId(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
          echo("Erro ao editar anamnese: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function excluirAnamnese(int $id)
    {
        $sqlExcluirAnamnese = "DELETE FROM anamnese WHERE id=:id";

        try {
            if ($this->conn->getConexao() === null) {
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirAnamnese);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            echo("Erro ao excluir a anamnese: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function carregarPorIdAnamnese(int $id)
    {
        $sqlCarregarPorIdAnamnese = "SELECT * FROM anamnese WHERE id=:id";

        try {
            if ($this->conn->getConexao() === null) {
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdAnamnese);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return null; // Anamnese não encontrada
            }

            $anamnese = new Anamnese();
            $anamnese->setId($result['id']);
            $anamnese->setDataInicioSintomas($result['data_inicio_sintomas']);
            $anamnese->setFatoresDesencadeiamSintomas($result['fatores_desencadeiam_sintomas']);
            $anamnese->setNivelDor($result['nivel_dor']);
            $anamnese->setLocalizacaoDor($result['localizacao_dor']);
            $anamnese->setTratamentoAnterior($result['tratamento_anterior']);
            $anamnese->setMotivoTratamentoAnterior($result['motivo_tratamento_anterior']);
            $anamnese->setResultadoTratamentoAnterior($result['resultado_tratamento_anterio']);
            $anamnese->setProblemaFisicoRecorrente($result['problema_fisico_recorrente']);
            $anamnese->setDoencasPrevias($result['doencas_previas']);
            $anamnese->setCirurgias($result['cirurgias']);
            $anamnese->setAlergias($result['alergias']);
            $anamnese->setMedicamentoEmUso($result['medicamentos_em_uso']);
            $anamnese->setHistoricoFamiliarRelevante($result['historico_familiar_relevante']);
            $anamnese->setCpf($result['cpf']);

            return $anamnese;
        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id a anamnese: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function carregarPorIdAnamneseJson(int $id)
    {
        $sqlCarregarPorIdAnamnese = "SELECT * FROM anamnese WHERE id=:id";

        try {
            if ($this->conn->getConexao() === null) {
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdAnamnese);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return null; // Anamnese não encontrada
            }

            $anamnese = new Anamnese();
            $anamnese->setId($result['id']);
            $anamnese->setDataInicioSintomas($result['data_inicio_sintomas']);
            $anamnese->setFatoresDesencadeiamSintomas($result['fatores_desencadeiam_sintomas']);
            $anamnese->setNivelDor($result['nivel_dor']);
            $anamnese->setLocalizacaoDor($result['localizacao_dor']);
            $anamnese->setTratamentoAnterior($result['tratamento_anterior']);
            $anamnese->setMotivoTratamentoAnterior($result['motivo_tratamento_anterior']);
            $anamnese->setResultadoTratamentoAnterior($result['resultado_tratamento_anterio']);
            $anamnese->setProblemaFisicoRecorrente($result['problema_fisico_recorrente']);
            $anamnese->setDoencasPrevias($result['doencas_previas']);
            $anamnese->setCirurgias($result['cirurgias']);
            $anamnese->setAlergias($result['alergias']);
            $anamnese->setMedicamentoEmUso($result['medicamentos_em_uso']);
            $anamnese->setHistoricoFamiliarRelevante($result['historico_familiar_relevante']);
            $anamnese->setCpf($result['cpf']);

            header('Content-Type: application/json');
            echo json_encode($anamnese->toJson(), JSON_UNESCAPED_UNICODE);

        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id a anamnese: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function listarAnamneses()
    {
        $sqlListarAnamneses = "SELECT * FROM anamnese";

        try {
            if ($this->conn->getConexao() === null) {
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlListarAnamneses);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $anamneses = [];

            foreach ($result as $row) {
                $anamnese = new Anamnese();
                $anamnese->setId($row['id']);
                $anamnese->setDataInicioSintomas($row['data_inicio_sintomas']);
                $anamnese->setFatoresDesencadeiamSintomas($row['fatores_desencadeiam_sintomas']);
                $anamnese->setNivelDor($row['nivel_dor']);
                $anamnese->setLocalizacaoDor($row['localizacao_dor']);
                $anamnese->setTratamentoAnterior($row['tratamento_anterior']);
                $anamnese->setMotivoTratamentoAnterior($row['motivo_tratamento_anterior']);
                $anamnese->setResultadoTratamentoAnterior($row['resultado_tratamento_anterio']);
                $anamnese->setProblemaFisicoRecorrente($row['problema_fisico_recorrente']);
                $anamnese->setDoencasPrevias($row['doencas_previas']);
                $anamnese->setCirurgias($row['cirurgias']);
                $anamnese->setAlergias($row['alergias']);
                $anamnese->setMedicamentoEmUso($row['medicamentos_em_uso']);
                $anamnese->setHistoricoFamiliarRelevante($row['historico_familiar_relevante']);
                $anamnese->setCpf($result['cpf']);

                $anamneses[] = $anamnese;
            }

            return $anamneses;
        } catch (\PDOException $e) {
            error_log("Erro ao listar anamneses: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
    public function listarAnamnesesJson()
    {
        $sqlListarAnamneses = "SELECT * FROM anamnese";

        try {
            if ($this->conn->getConexao() === null) {
                $this->conn->reconectar();
            }
            $stmt = $this->conn->getConexao()->prepare($sqlListarAnamneses);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $anamneses = [];

            foreach ($result as $row) {
                $anamnese = new Anamnese();
                $anamnese->setId($row['id']);
                $anamnese->setDataInicioSintomas($row['data_inicio_sintomas']);
                $anamnese->setFatoresDesencadeiamSintomas($row['fatores_desencadeiam_sintomas']);
                $anamnese->setNivelDor($row['nivel_dor']);
                $anamnese->setLocalizacaoDor($row['localizacao_dor']);
                $anamnese->setTratamentoAnterior($row['tratamento_anterior']);
                $anamnese->setMotivoTratamentoAnterior($row['motivo_tratamento_anterior']);
                $anamnese->setResultadoTratamentoAnterior($row['resultado_tratamento_anterio']);
                $anamnese->setProblemaFisicoRecorrente($row['problema_fisico_recorrente']);
                $anamnese->setDoencasPrevias($row['doencas_previas']);
                $anamnese->setCirurgias($row['cirurgias']);
                $anamnese->setAlergias($row['alergias']);
                $anamnese->setMedicamentoEmUso($row['medicamentos_em_uso']);
                $anamnese->setHistoricoFamiliarRelevante($row['historico_familiar_relevante']);
                $anamnese->setCpf($row['cpf']);
                $anamneses[] = $anamnese->toJson();
            }

            header('Content-Type: application/json');
            echo json_encode($anamneses, JSON_UNESCAPED_UNICODE);

        } catch (\PDOException $e) {
            echo("Erro ao listar anamneses: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
}
