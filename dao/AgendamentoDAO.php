<?php
include_once(dirname(__FILE__) . "/../dataBase/DataBase.php");
include_once(dirname(__FILE__) . "/../models/Agendamento.php");




class AgendamentoDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = DataBase::getInstance();
    }

    public function inserirAgendamento(Agendamento $agendamento)
    {
        $sqlInserirAgendamento = "INSERT INTO agendamentos (
            tipo_agendamento, data_agendamento, hora_agendamento, data_registro_agendamento, quem_registro_agendamento, status_agendamento, cor,
            consulta_id, avaliacao_id
        ) VALUES (
            :tipo_agendamento, :dataAgendamento, :horaAgendamento, :dataRegistroAgendamento, :quemRegistrou, :statusAgendamento, :cor,
            :consultaId, :avaliacaoId
        )";
    
        try {
            if ($this->conn->getConexao() === null) {
                $this->conn->reconectar();
            }
    
            $stmt = $this->conn->getConexao()->prepare($sqlInserirAgendamento);
            $stmt->bindValue(":tipo_agendamento", $agendamento->getTipo(), PDO::PARAM_STR);
            $stmt->bindValue(":dataAgendamento", $agendamento->getDataAgendamento(), PDO::PARAM_STR);
            $stmt->bindValue(":horaAgendamento", $agendamento->getHoraAgendamento(), PDO::PARAM_STR);
            $stmt->bindValue(":dataRegistroAgendamento", $agendamento->getDataRegistroAgendamento(), PDO::PARAM_STR);
            $stmt->bindValue(":quemRegistrou", $agendamento->getQuemRegistrou(), PDO::PARAM_STR);
            $stmt->bindValue(":statusAgendamento", 'Agendado', PDO::PARAM_STR);
            $stmt->bindValue(":cor", $agendamento->getCor(), PDO::PARAM_STR);
    
            // Vincula o parâmetro relevante dependendo do tipo de agendamento
            if ($agendamento->getTipo() == "consulta") {
                $stmt->bindValue(":consultaId", $agendamento->getConsulta()->getId(), PDO::PARAM_INT);
                $stmt->bindValue(":avaliacaoId", null, PDO::PARAM_NULL); // Define como nulo para evitar problema de contagem de parâmetros
            } else {
                $stmt->bindValue(":consultaId", null, PDO::PARAM_NULL); // Define como nulo para evitar problema de contagem de parâmetros
                $stmt->bindValue(":avaliacaoId", $agendamento->getAvaliacao()->getId(), PDO::PARAM_INT);
            }
    
            $stmt->execute();
        } catch (\PDOException $e) {
            echo("Erro ao inserir agendamento: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
    

    public function editarAgendamento(Agendamento $agendamento)
    {
        $sqlEditarAgendamento = "UPDATE agendamentos SET 
            tipo_agendamento=:tipo_agendamento, 
            data_agendamento=:dataAgendamento, 
            hora_agendamento=:horaAgendamento, 
            data_registro_agendamento=:dataRegistroAgendamento, 
            data_alteracao=:dataAlteracao, 
            quem_registro_agendamento=:quemRegistrou, 
            quem_alterou=:quemAlterou, 
            status_agendamento=:statusAgendamento, 
            cor=:cor,
            consulta_id=:consultaId, 
            avaliacao_id=:avaliacaoId
            WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarAgendamento);
            $stmt->bindValue(":tipo_agendamento", $agendamento->getTipo(), PDO::PARAM_STR);
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
        $sqlExcluirAgendamento = "DELETE FROM agendamentos WHERE id=:id";

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
        $sqlCarregarPorIdAgendamento = "SELECT * FROM agendamentos WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdAgendamento);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return null; // agendamentos não encontrado
            }

            $agendamento = new Agendamento();
            $agendamento->setId($result['id']);
            $agendamento->setTipo($result['tipo_agendamento']);
            $agendamento->setDataAgendamento($result['data_agendamento']);
            $agendamento->setHoraAgendamento($result['hora_agendamento']);
            $agendamento->setDataRegistroAgendamento($result['data_registro_agendamento']);
            $agendamento->setDataAlteracao($result['data_alteracao']);
            $agendamento->setQuemRegistrou($result['quem_registro_agendamento']);
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
            error_log("Erro ao carregar agendamentos por ID: " . $e->getMessage());
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
                $agendamento->setTipo($row['tipo_agendamento']);
                $agendamento->setDataAgendamento($row['data_agendamento']);
                $agendamento->setHoraAgendamento($row['hora_agendamento']);
                $agendamento->setDataRegistroAgendamento($row['data_registro_agendamento']);
                $agendamento->setDataAlteracao($row['data_alteracao']);
                $agendamento->setQuemRegistrou($row['quem_registro_agendamento']);
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
