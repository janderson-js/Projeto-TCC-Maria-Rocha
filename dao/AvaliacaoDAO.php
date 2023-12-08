<?php

require_once(dirname(__FILE__) . "/../dataBase/DataBase.php");
require_once(dirname(__FILE__) . "/../models/Avaliacao.php");
if (!class_exists('AvaliacaoDAO')) {
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
            data_avaliacao, hora_avaliacao, pacientes_id, funcionarios_id
        ) VALUES (
            :dataAvaliacao, :horaAvaliacao, :pacienteId, :funcionarioId
        )";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
                $stmt = $this->conn->getConexao()->prepare($sqlInserirAvaliacao);
                $stmt->bindValue(":dataAvaliacao", $avaliacao->getDataAvaliacao(), PDO::PARAM_STR);
                $stmt->bindValue(":horaAvaliacao", $avaliacao->gethoraAvaliacao(), PDO::PARAM_STR);
                $stmt->bindValue(":pacienteId", $avaliacao->getPaciente()->getId(), PDO::PARAM_INT);
                $stmt->bindValue(":funcionarioId", $avaliacao->getFuncionario()->getId(), PDO::PARAM_INT);

                $stmt->execute();

                $idInerido = $this->conn->getConexao()->lastInsertId();

                return $idInerido;
            } catch (\PDOException $e) {
                echo ("Erro ao inserir avaliação: " . $e->getMessage());
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
            pacientes_id=:pacienteId, 
            funcionarios_id=:funcionarioId
            WHERE id=:id";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
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
                echo ("Erro ao editar avaliação: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }

        public function excluirAvaliacao(int $id)
        {
            $sqlExcluirAvaliacao = "DELETE FROM avaliacao WHERE id=:id";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
                $stmt = $this->conn->getConexao()->prepare($sqlExcluirAvaliacao);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                $stmt->execute();
            } catch (\PDOException $e) {
                echo ("Erro ao excluir a avaliação: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }

        public function carregarPorIdAvaliacao(int $id)
        {
            $sqlCarregarPorIdAvaliacao = "SELECT * FROM avaliacao WHERE id=:id";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
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
                //$avaliacao->setObservacoes($result['observacoes']);
                //$avaliacao->setDiagnosticoInicial($result['diagnostico_inicial']);
                //$avaliacao->setResultadoTesteExames($result['resultado_teste_exames']);

                $pacienteDAO = new PacienteDAO();
                $avaliacao->setPaciente($pacienteDAO->carregarPorIdPaciente($result['pacientes_id']));

                $funcionarioDAO = new FuncionarioDAO();
                $avaliacao->setFuncionario($funcionarioDAO->carregarPorIdFuncionario($result['funcionarios_id']));

                return $avaliacao;
            } catch (\PDOException $e) {
                echo ("Erro ao carregar por id a avaliação: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }

        public function listarAvaliacoes()
        {
            $sqlListarAvaliacoes = "SELECT id, data_avaliacao, hora_avaliacao, pacientes_id, funcionarios_id FROM avaliacao";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
                $stmt = $this->conn->getConexao()->prepare($sqlListarAvaliacoes);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $avaliacoes = [];

                foreach ($result as $row) {
                    $avaliacao = new Avaliacao();
                    $avaliacao->setId($row['id']);
                    $avaliacao->setDataAvaliacao($row['data_avaliacao']);
                    $avaliacao->sethoraAvaliacao($row['hora_avaliacao']);
                    $avaliacao->setObservacoes("");
                    $avaliacao->setDiagnosticoInicial("");
                    $avaliacao->setResultadoTesteExames("");

                    // Carregar paciente e funcionário associados à avaliação
                    $pacienteDAO = new PacienteDAO();
                    $avaliacao->setPaciente($pacienteDAO->carregarPorIdPaciente($row['pacientes_id']));

                    $funcionarioDAO = new FuncionarioDAO();
                    $avaliacao->setFuncionario($funcionarioDAO->carregarPorIdFuncionario($row['funcionarios_id']));

                    $avaliacoes[] = $avaliacao;
                }

                return $avaliacoes;
            } catch (\PDOException $e) {
                echo ("Erro ao listar avaliações: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }
    }
}
