<?php

require_once(dirname(__FILE__) . "/../dataBase/DataBase.php");
require_once(dirname(__FILE__) . "/../models/Paciente.php");

if (!class_exists('PacienteDAO')) {

    class PacienteDAO
    {
        private $conn;

        public function __construct()
        {
            $this->conn = DataBase::getInstance();
        }

        public function inserirPaciente(Paciente $paciente)
        {
            $sqlInserirPaciente = "INSERT INTO pacientes (
            nome, idade, cpf, login, senha, genero, profissao, telefone, celular, data_nascimento
        ) VALUES (
            :nome, :idade, :cpf, :login, :senha, :genero, :profissao, :telefone, :celular, :data_nascimento
        )";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
                $stmt = $this->conn->getConexao()->prepare($sqlInserirPaciente);
                $stmt->bindValue(":nome", $paciente->getNome(), PDO::PARAM_STR);
                $stmt->bindValue(":idade", $paciente->getIdade(), PDO::PARAM_INT);
                $stmt->bindValue(":cpf", $paciente->getCpf(), PDO::PARAM_STR);
                $stmt->bindValue(":login", $paciente->getLogin(), PDO::PARAM_STR);
                $stmt->bindValue(":senha", $paciente->getSenha(), PDO::PARAM_STR);
                $stmt->bindValue(":genero", $paciente->getGenero(), PDO::PARAM_STR);
                $stmt->bindValue(":profissao", $paciente->getProfissao(), PDO::PARAM_STR);
                $stmt->bindValue(":telefone", $paciente->getTelefone(), PDO::PARAM_STR);
                $stmt->bindValue(":celular", $paciente->getCelular(), PDO::PARAM_STR);
                $stmt->bindValue(":data_nascimento", $paciente->getDataNascimento(), PDO::PARAM_STR);

                // Adicione aqui o código para salvar os objetos relacionados (HistoricoAtual, HistoricoMedico, HistoricoFisioterapeutico)

                try {
                    $result = $stmt->execute();
                    var_dump($result);
                } catch (\PDOException $e) {
                    echo "Erro do PDO: " . $e->getMessage();
                }
            } catch (\PDOException $e) {
                error_log("Erro ao inserir paciente: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }

        public function editarPaciente(Paciente $paciente)
        {
            $sqlEditarPaciente = "UPDATE pacientes SET 
            nome=:nome, idade=:idade, cpf=:cpf, login=:login, senha=:senha, genero=:genero, 
            profissao=:profissao, telefone=:telefone, celular=:celular, data_nascimento=:data_nascimento
            WHERE id=:id";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
                $stmt = $this->conn->getConexao()->prepare($sqlEditarPaciente);
                $stmt->bindValue(":nome", $paciente->getNome(), PDO::PARAM_STR);
                $stmt->bindValue(":idade", $paciente->getIdade(), PDO::PARAM_INT);
                $stmt->bindValue(":cpf", $paciente->getCpf(), PDO::PARAM_STR);
                $stmt->bindValue(":login", $paciente->getLogin(), PDO::PARAM_STR);
                $stmt->bindValue(":senha", $paciente->getSenha(), PDO::PARAM_STR);
                $stmt->bindValue(":genero", $paciente->getGenero(), PDO::PARAM_STR);
                $stmt->bindValue(":profissao", $paciente->getProfissao(), PDO::PARAM_STR);
                $stmt->bindValue(":telefone", $paciente->getTelefone(), PDO::PARAM_STR);
                $stmt->bindValue(":celular", $paciente->getCelular(), PDO::PARAM_STR);
                $stmt->bindValue(":data_nascimento", $paciente->getDataNascimento(), PDO::PARAM_STR);
                $stmt->bindValue(":id", $paciente->getId(), PDO::PARAM_INT);

                $stmt->execute();
            } catch (\PDOException $e) {
                error_log("Erro ao editar paciente: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }

        public function excluirPaciente(int $id)
        {
            $sqlExcluirPaciente = "DELETE FROM pacientes WHERE id=:id";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
                $stmt = $this->conn->getConexao()->prepare($sqlExcluirPaciente);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                // Adicione aqui o código para excluir os objetos relacionados (HistoricoAtual, HistoricoMedico, HistoricoFisioterapeutico)

                $stmt->execute();
            } catch (\PDOException $e) {
                error_log("Erro ao excluir o paciente: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }
        public function carregarPorIdPacienteJson($id)
        {
            $sqlCarregarPorIdPaciente = "SELECT * FROM pacientes WHERE id=:id";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
                $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdPaciente);
                $stmt->bindValue(":id", $id, PDO::PARAM_INT);

                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!$result) {
                    return null; // Paciente não encontrado
                }

                $paciente = new Paciente();
                $paciente->setId($result['id']);
                $paciente->setNome($result['nome']);
                $paciente->setIdade($result['idade']);
                $paciente->setCpf($result['cpf']);
                $paciente->setLogin($result['login']);
                $paciente->setSenha($result['senha']);
                $paciente->setGenero($result['genero']);
                $paciente->setProfissao($result['profissao']);
                $paciente->setTelefone($result['telefone']);
                $paciente->setCelular($result['celular']);
                $paciente->setDataNascimento($result['data_nascimento']);



                header('Content-Type: application/json');
                echo json_encode($paciente->toJson(), JSON_UNESCAPED_UNICODE);
            } catch (\PDOException $e) {
                error_log("Erro ao carregar por id o paciente: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }

        public function carregarPorIdPaciente(int $id)
        {
            $sqlCarregarPorIdPaciente = "SELECT * FROM pacientes WHERE id=:id";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
                $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdPaciente);
                $stmt->bindValue(":id", $id, PDO::PARAM_INT);

                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$result) {
                    return null; // Paciente não encontrado
                }

                $paciente = new Paciente();
                $paciente->setId($result['id']);
                $paciente->setNome($result['nome']);
                $paciente->setIdade($result['idade']);
                $paciente->setCpf($result['cpf']);
                $paciente->setLogin($result['login']);
                $paciente->setSenha($result['senha']);
                $paciente->setGenero($result['genero']);
                $paciente->setProfissao($result['profissao']);
                $paciente->setTelefone($result['telefone']);
                $paciente->setCelular($result['celular']);
                $paciente->setDataNascimento($result['data_nascimento']);

                // Adicione aqui o código para carregar os objetos relacionados (HistoricoAtual, HistoricoMedico, HistoricoFisioterapeutico)

                return $paciente;
            } catch (\PDOException $e) {
                error_log("Erro ao carregar por id o paciente: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }

        public function listarPacientes()
        {
            $sqlListarPacientes = "SELECT * FROM pacientes";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
                $stmt = $this->conn->getConexao()->prepare($sqlListarPacientes);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $pacientes = [];

                foreach ($result as $row) {
                    $paciente = new Paciente();
                    $paciente->setId($row['id']);
                    $paciente->setNome($row['nome']);
                    $paciente->setIdade($row['idade']);
                    $paciente->setCpf($row['cpf']);
                    $paciente->setLogin($row['login']);
                    $paciente->setSenha($row['senha']);
                    $paciente->setGenero($row['genero']);
                    $paciente->setProfissao($row['profissao']);
                    $paciente->setTelefone($row['telefone']);
                    $paciente->setCelular($row['celular']);
                    $paciente->setDataNascimento($row['data_nascimento']);

                    // Adicione aqui o código para carregar os objetos relacionados (HistoricoAtual, HistoricoMedico, HistoricoFisioterapeutico)

                    $pacientes[] = $paciente;
                }

                return $pacientes;
            } catch (\PDOException $e) {
                echo ("Erro ao listar pacientes: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }

        public function listarPacientesJson()
        {
            $sqlListarPacientes = "SELECT * FROM pacientes";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
                $stmt = $this->conn->getConexao()->prepare($sqlListarPacientes);

                try {
                    $result = $stmt->execute();
                } catch (\PDOException $e) {
                    echo "Erro do PDO: " . $e->getMessage();
                }

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $pacientes = [];

                foreach ($result as $row) {
                    $paciente = new Paciente();
                    $paciente->setId($row['id']);
                    $paciente->setNome($row['nome']);
                    $paciente->setIdade($row['idade']);
                    $paciente->setCpf($row['cpf']);
                    $paciente->setLogin($row['login']);
                    $paciente->setSenha($row['senha']);
                    $paciente->setGenero($row['genero']);
                    $paciente->setProfissao($row['profissao']);
                    $paciente->setTelefone($row['telefone']);
                    $paciente->setCelular($row['celular']);
                    $paciente->setDataNascimento($row['data_nascimento']);

                    $pacientes[] = $paciente->toJson();
                }

                header('Content-Type: application/json');
                echo json_encode($pacientes, JSON_UNESCAPED_UNICODE);
            } catch (\PDOException $e) {
                error_log("Erro ao listar pacientes: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }

        public function listarPacienteNãoVinculadoAnamnese()
        {
            $sqlListarPacientes = "SELECT pacientes.id, pacientes.cpf, pacientes.nome FROM pacientes LEFT JOIN anamnese_pacientes ON pacientes.id = anamnese_pacientes.pacientes_id WHERE anamnese_pacientes.pacientes_id IS NULL";

            try {
                if ($this->conn->getConexao() === null) {
                    $this->conn->reconectar();
                }
                $stmt = $this->conn->getConexao()->prepare($sqlListarPacientes);

                try {
                    $result = $stmt->execute();
                } catch (\PDOException $e) {
                    echo "Erro do PDO: " . $e->getMessage();
                }

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $pacientes = [];

                foreach ($result as $row) {
                    $paciente = new Paciente();
                    $paciente->setId($row['id']);
                    $paciente->setNome($row['nome']);
                    $paciente->setCpf($row['cpf']);

                    $pacientes[] = $paciente->toJsonPaciente();
                }

                header('Content-Type: application/json');
                echo json_encode($pacientes, JSON_UNESCAPED_UNICODE);
            } catch (\PDOException $e) {
                error_log("Erro ao listar pacientes: " . $e->getMessage());
            } finally {
                $this->conn->desconectar();
            }
        }
    }
}
