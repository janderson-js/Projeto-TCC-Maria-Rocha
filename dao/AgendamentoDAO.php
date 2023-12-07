<?php

include "../dataBase/DataBase.php";
include "../models/Agendamento.php";

class AgendamentoDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = DataBase::getInstance();
    }

    public function inserirAgendamento(Agendamento $agendamento)
    {
        $sqlInserirAgendamento = "INSERT INTO agendamento (
            tipo, data_agendamento, hora_agendamento, data_registro_agendamento, 
            data_alteracao, quem_registrou, quem_alterou, status_agendamento, cor,
            consulta_id, avaliacao_id
        ) VALUES (
            :tipo, :dataAgendamento, :horaAgendamento, :dataRegistroAgendamento, 
            :dataAlteracao, :quemRegistrou, :quemAlterou, :statusAgendamento, :cor,
            :consultaId, :avaliacaoId
        )";

        try {

            if ($this->conn->getConexao() === null) {
                $this->conn->reconectar();
            }

            $stmt = $this->conn->getConexao()->prepare($sqlInserirAgendamento);
            $stmt->bindValue(":tipo", $agendamento->getTipo(), PDO::PARAM_STR);
            $stmt->bindValue(":dataAgendamento", $agendamento->getDataAgendamento(), PDO::PARAM_STR);
            $stmt->bindValue(":horaAgendamento", $agendamento->getHoraAgendamento(), PDO::PARAM_STR);
            $stmt->bindValue(":dataRegistroAgendamento", $agendamento->getDataRegistroAgendamento(), PDO::PARAM_STR);
            $stmt->bindValue(":dataAlteracao", $agendamento->getDataAlteracao(), PDO::PARAM_STR);
            $stmt->bindValue(":quemRegistrou", $agendamento->getQuemRegistrou(), PDO::PARAM_STR);
            $stmt->bindValue(":quemAlterou", $agendamento->getQuemAlterou(), PDO::PARAM_STR);
            $stmt->bindValue(":statusAgendamento", $agendamento->getStatusAgendamento(), PDO::PARAM_STR);
            $stmt->bindValue(":cor", $agendamento->getCor(), PDO::PARAM_STR);
            $stmt->bindValue(":consultaId", $agendamento->getConsulta()->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":avaliacaoId", $agendamento->getAvaliacao()->getId(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao inserir agendamento: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function editarAgendamento(Agendamento $agendamento)
    {
        $sqlEditarAgendamento = "UPDATE agendamento SET 
            tipo=:tipo, 
            data_agendamento=:dataAgendamento, 
            hora_agendamento=:horaAgendamento, 
            data_registro_agendamento=:dataRegistroAgendamento, 
            data_alteracao=:dataAlteracao, 
            quem_registrou=:quemRegistrou, 
            quem_alterou=:quemAlterou, 
            status_agendamento=:statusAgendamento, 
            cor=:cor,
            consulta_id=:consultaId, 
            avaliacao_id=:avaliacaoId
            WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarAgendamento);
            $stmt->bindValue(":tipo", $agendamento->getTipo(), PDO::PARAM_STR);
            $stmt->bindValue(":dataAgendamento", $agendamento->getDataAgendamento(), PDO::PARAM_STR);
            $stmt->bindValue(":horaAgendamento", $agendamento->getHoraAgendamento(), PDO::PARAM_STR);
            $stmt->bindValue(":dataRegistroAgendamento", $agendamento->getDataRegistroAgendamento(), PDO::PARAM_STR);
            $stmt->bindValue(":dataAlteracao", $agendamento->getDataAlteracao(), PDO::PARAM_STR);
            $stmt->bindValue(":quemRegistrou", $agendamento->getQuemRegistrou(), PDO::PARAM_STR);
            $stmt->bindValue(":quemAlterou", $agendamento->getQuemAlterou(), PDO::PARAM_STR);
            $stmt->bindValue(":statusAgendamento", $agendamento->getStatusAgendamento(), PDO::PARAM_STR);
            $stmt->bindValue(":cor", $agendamento->getCor(), PDO::PARAM_STR);
            $stmt->bindValue(":consultaId", $agendamento->getConsulta()->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":avaliacaoId", $agendamento->getAvaliacao()->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":id", $agendamento->getId(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao editar agendamento: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function excluirAgendamento(int $id)
    {
        $sqlExcluirAgendamento = "DELETE FROM agendamento WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirAgendamento);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao excluir o agendamento: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function carregarPorIdAgendamento(int $id)
    {
        $sqlCarregarPorIdAgendamento = "SELECT * FROM agendamento WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdAgendamento);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return null; // Agendamento não encontrado
            }

            $agendamento = new Agendamento();
            $agendamento->setId($result['id']);
            $agendamento->setTipo($result['tipo']);
            $agendamento->setDataAgendamento($result['data_agendamento']);
            $agendamento->setHoraAgendamento($result['hora_agendamento']);
            $agendamento->setDataRegistroAgendamento($result['data_registro_agendamento']);
            $agendamento->setDataAlteracao($result['data_alteracao']);
            $agendamento->setQuemRegistrou($result['quem_registrou']);
            $agendamento->setQuemAlterou($result['quem_alterou']);
            $agendamento->setStatusAgendamento($result['status_agendamento']);
            $agendamento->setCor($result['cor']);

            // Recuperar a consulta associada ao agendamento
            $consultaDAO = new ConsultaDAO();
            $consulta = $consultaDAO->carregarPorIdConsulta($result['consulta_id']);
            $agendamento->setConsulta($consulta);

            // Recuperar a avaliação associada ao agendamento
            $avaliacaoDAO = new AvaliacaoDAO();
            $avaliacao = $avaliacaoDAO->carregarPorIdAvaliacao($result['avaliacao_id']);
            $agendamento->setAvaliacao($avaliacao);

            return $agendamento;
        } catch (\PDOException $e) {
            error_log("Erro ao carregar agendamento por ID: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function listarAgendamentos()
    {
        $sqlListarAgendamentos = "SELECT * FROM agendamento";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarAgendamentos);

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $agendamentos = [];

            foreach ($result as $row) {
                $agendamento = new Agendamento();
                $agendamento->setId($row['id']);
                $agendamento->setTipo($row['tipo']);
                $agendamento->setDataAgendamento($row['data_agendamento']);
                $agendamento->setHoraAgendamento($row['hora_agendamento']);
                $agendamento->setDataRegistroAgendamento($row['data_registro_agendamento']);
                $agendamento->setDataAlteracao($row['data_alteracao']);
                $agendamento->setQuemRegistrou($row['quem_registrou']);
                $agendamento->setQuemAlterou($row['quem_alterou']);
                $agendamento->setStatusAgendamento($row['status_agendamento']);
                $agendamento->setCor($row['cor']);

                // Recuperar a consulta associada ao agendamento
                $consultaDAO = new ConsultaDAO();
                $consulta = $consultaDAO->carregarPorIdConsulta($row['consulta_id']);
                $agendamento->setConsulta($consulta);

                // Recuperar a avaliação associada ao agendamento
                $avaliacaoDAO = new AvaliacaoDAO();
                $avaliacao = $avaliacaoDAO->carregarPorIdAvaliacao($row['avaliacao_id']);
                $agendamento->setAvaliacao($avaliacao);

                $agendamentos[] = $agendamento;
            }

            return $agendamentos;
        } catch (\PDOException $e) {
            error_log("Erro ao listar agendamentos: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
}
