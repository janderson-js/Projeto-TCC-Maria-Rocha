<?php

include_once(dirname(__FILE__) . "/../dataBase/DataBase.php");
include_once(dirname(__FILE__) . "/../models/Consulta.php");


class ConsultaDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = DataBase::getInstance();
    }

    public function inserirConsulta(Consulta $consulta)
    {
        $sqlInserirConsulta = "INSERT INTO consulta (
            data_consulta, hora_consulta, pacientes_id, funcionarios_id
        ) VALUES (
            :data_consulta, :hora_consulta, :pacienteId, :funcionarioId
        )";

        try {
            if ($this->conn->getConexao() === null) {
                $this->conn->reconectar();
            }

            $stmt = $this->conn->getConexao()->prepare($sqlInserirConsulta);
            $stmt->bindValue(":data_consulta", $consulta->getData(), PDO::PARAM_STR);
            $stmt->bindValue(":hora_consulta", $consulta->getHora(), PDO::PARAM_STR);
            $stmt->bindValue(":pacienteId", $consulta->getPaciente()->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":funcionarioId", $consulta->getFuncionario()->getId(), PDO::PARAM_INT);

            $stmt->execute();
            $idInserido = $this->conn->getConexao()->lastInsertId();

            return $idInserido;
        } catch (\PDOException $e) {
            echo("Erro ao inserir consulta: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function editarConsulta(Consulta $consulta)
    {
        $sqlEditarConsulta = "UPDATE consulta SET 
            data=:data, 
            hora=:hora, 
            observacoes_especificas=:observacoesEspecificas, 
            procedimentos_ou_tratamentos_realizados=:procedimentosOuTratamentosRealizados,
            pacientes_id=:pacienteId, 
            funcionarios_id=:funcionarioId
            WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarConsulta);
            $stmt->bindValue(":data", $consulta->getData(), PDO::PARAM_STR);
            $stmt->bindValue(":hora", $consulta->getHora(), PDO::PARAM_STR);
            $stmt->bindValue(":observacoesEspecificas", $consulta->getObservacoesEspecificas(), PDO::PARAM_STR);
            $stmt->bindValue(":procedimentosOuTratamentosRealizados", $consulta->getProcedimentosOuTratamentosRealizados(), PDO::PARAM_STR);
            $stmt->bindValue(":pacienteId", $consulta->getPaciente()->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":funcionarioId", $consulta->getFuncionario()->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":id", $consulta->getId(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            echo("Erro ao editar consulta: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function excluirConsulta(int $id)
    {
        $sqlExcluirConsulta = "DELETE FROM consulta WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirConsulta);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            echo("Erro ao excluir a consulta: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function carregarPorIdConsulta(int $id)
    {
        $sqlCarregarPorIdConsulta = "SELECT * FROM consulta WHERE id=:id";

        try {
            if ($this->conn->getConexao() === null) {
                $this->conn->reconectar();
            }

            $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdConsulta);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return null; // Consulta não encontrada
            }

            $consulta = new Consulta();
            $consulta->setId($result['id']);
            $consulta->setData($result['data_consulta']);
            $consulta->setHora($result['hora_consulta']);
           // $consulta->setObservacoesEspecificas($result['observacoes_especificas']);
            //$consulta->setProcedimentosOuTratamentosRealizados($result['procedimentos_ou_tratamentos_realizados']);

            // Carregar paciente e funcionário associados à consulta
            $pacienteDAO = new PacienteDAO();
            $consulta->setPaciente($pacienteDAO->carregarPorIdPaciente($result['pacientes_id']));

            $funcionarioDAO = new FuncionarioDAO();
            $consulta->setFuncionario($funcionarioDAO->carregarPorIdFuncionario($result['funcionarios_id']));

            return $consulta;
        } catch (\PDOException $e) {
            echo("Erro ao carregar por id a consulta: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function listarConsultas()
    {
        $sqlListarConsultas = "SELECT * FROM consulta";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarConsultas);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $consultas = [];

            foreach ($result as $row) {
                $consulta = new Consulta();
                $consulta->setId($row['id']);
                $consulta->setData($row['data']);
                $consulta->setHora($row['hora']);
                $consulta->setObservacoesEspecificas($row['observacoes_especificas']);
                $consulta->setProcedimentosOuTratamentosRealizados($row['procedimentos_ou_tratamentos_realizados']);

                // Carregar paciente e funcionário associados à consulta
                $pacienteDAO = new PacienteDAO();
                $consulta->setPaciente($pacienteDAO->carregarPorIdPaciente($row['pacientes_id']));

                $funcionarioDAO = new FuncionarioDAO();
                $consulta->setFuncionario($funcionarioDAO->carregarPorIdFuncionario($row['funcionarios_id']));

                $consultas[] = $consulta;
            }

            return $consultas;
        } catch (\PDOException $e) {
            echo("Erro ao listar consultas: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
}
