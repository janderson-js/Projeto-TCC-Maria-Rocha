<?php

include_once(dirname(__FILE__) . "/../dataBase/DataBase.php");
include_once(dirname(__FILE__) . "/../models/Avaliacao.php");

class AvaliacaoDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = DataBase::getInstance();
    }

    public function inserirAvaliacao(Avaliacao $avaliacao)
    {
        $sqlInserirAvaliacao = "INSERT INTO avaliacao (
            data_avaliacao, hora_avaliacao, observacoes, diagnostico_inicial, resultado_teste_exames,
            paciente_id, funcionario_id
        ) VALUES (
            :dataAvaliacao, :horaAvaliacao, :observacoes, :diagnosticoInicial, :resultadoTesteExames,
            :pacienteId, :funcionarioId
        )";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirAvaliacao);
            $stmt->bindValue(":dataAvaliacao", $avaliacao->getDataAvaliacao(), PDO::PARAM_STR);
            $stmt->bindValue(":horaAvaliacao", $avaliacao->gethoraAvaliacao(), PDO::PARAM_STR);
            $stmt->bindValue(":observacoes", $avaliacao->getObservacoes(), PDO::PARAM_STR);
            $stmt->bindValue(":diagnosticoInicial", $avaliacao->getDiagnosticoInicial(), PDO::PARAM_STR);
            $stmt->bindValue(":resultadoTesteExames", $avaliacao->getResultadoTesteExames(), PDO::PARAM_STR);
            $stmt->bindValue(":pacienteId", $avaliacao->getPaciente()->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":funcionarioId", $avaliacao->getFuncionario()->getId(), PDO::PARAM_INT);

            $stmt->execute();

            $idInerido = $this->conn->getConexao()->lastInsertId();

            return $idInerido;
        } catch (\PDOException $e) {
            error_log("Erro ao inserir avaliação: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function editarAvaliacao(Avaliacao $avaliacao)
    {
        $sqlEditarAvaliacao = "UPDATE avaliacao SET 
            data_avaliacao=:dataAvaliacao, 
            hora_avaliacao=:horaAvaliacao, 
            observacoes=:observacoes, 
            diagnostico_inicial=:diagnosticoInicial, 
            resultado_teste_exames=:resultadoTesteExames,
            paciente_id=:pacienteId, 
            funcionario_id=:funcionarioId
            WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarAvaliacao);
            $stmt->bindValue(":dataAvaliacao", $avaliacao->getDataAvaliacao(), PDO::PARAM_STR);
            $stmt->bindValue(":horaAvaliacao", $avaliacao->gethoraAvaliacao(), PDO::PARAM_STR);
            $stmt->bindValue(":observacoes", $avaliacao->getObservacoes(), PDO::PARAM_STR);
            $stmt->bindValue(":diagnosticoInicial", $avaliacao->getDiagnosticoInicial(), PDO::PARAM_STR);
            $stmt->bindValue(":resultadoTesteExames", $avaliacao->getResultadoTesteExames(), PDO::PARAM_STR);
            $stmt->bindValue(":pacienteId", $avaliacao->getPaciente()->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":funcionarioId", $avaliacao->getFuncionario()->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":id", $avaliacao->getId(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao editar avaliação: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function excluirAvaliacao(int $id)
    {
        $sqlExcluirAvaliacao = "DELETE FROM avaliacao WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirAvaliacao);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao excluir a avaliação: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function carregarPorIdAvaliacao(int $id)
    {
        $sqlCarregarPorIdAvaliacao = "SELECT * FROM avaliacao WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdAvaliacao);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return null; // Avaliação não encontrada
            }

            $avaliacao = new Avaliacao();
            $avaliacao->setId($result['id']);
            $avaliacao->setDataAvaliacao($result['data_avaliacao']);
            $avaliacao->sethoraAvaliacao($result['hora_avaliacao']);
            $avaliacao->setObservacoes($result['observacoes']);
            $avaliacao->setDiagnosticoInicial($result['diagnostico_inicial']);
            $avaliacao->setResultadoTesteExames($result['resultado_teste_exames']);

            // Carregar paciente e funcionário associados à avaliação
            $pacienteDAO = new PacienteDAO();
            $avaliacao->setPaciente($pacienteDAO->carregarPorIdPaciente($result['paciente_id']));

            $funcionarioDAO = new FuncionarioDAO();
            $avaliacao->setFuncionario($funcionarioDAO->carregarPorIdFuncionario($result['funcionario_id']));

            return $avaliacao;
        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id a avaliação: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function listarAvaliacoes()
    {
        $sqlListarAvaliacoes = "SELECT * FROM avaliacao";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarAvaliacoes);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $avaliacoes = [];

            foreach ($result as $row) {
                $avaliacao = new Avaliacao();
                $avaliacao->setId($row['id']);
                $avaliacao->setDataAvaliacao($row['data_avaliacao']);
                $avaliacao->sethoraAvaliacao($row['hora_avaliacao']);
                $avaliacao->setObservacoes($row['observacoes']);
                $avaliacao->setDiagnosticoInicial($row['diagnostico_inicial']);
                $avaliacao->setResultadoTesteExames($row['resultado_teste_exames']);

                // Carregar paciente e funcionário associados à avaliação
                $pacienteDAO = new PacienteDAO();
                $avaliacao->setPaciente($pacienteDAO->carregarPorIdPaciente($row['paciente_id']));

                $funcionarioDAO = new FuncionarioDAO();
                $avaliacao->setFuncionario($funcionarioDAO->carregarPorIdFuncionario($row['funcionario_id']));

                $avaliacoes[] = $avaliacao;
            }

            return $avaliacoes;
        } catch (\PDOException $e) {
            error_log("Erro ao listar avaliações: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
}
