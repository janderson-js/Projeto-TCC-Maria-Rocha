<?php
include_once(dirname(__FILE__) . "/../dataBase/DataBase.php");
include_once(dirname(__FILE__) . "/../models/Funcionario.php");
include_once(dirname(__FILE__) . "/../models/Perfil.php");
include_once(dirname(__FILE__) . "/../dao/PerfilDAO.php");
if (!class_exists('AvaliacaoDAO')) {

    if (!class_exists('FuncionarioDAO')) {
        class FuncionarioDAO
        {
            private $conn;

            public function __construct()
            {
                $this->conn = DataBase::getInstance();
            }

            public function inserirFuncionario(Funcionario $funcionario)
            {
                $sqlInserirFuncionario = "INSERT INTO funcionarios (nome, coffito, matricula, senha, idade, genero, telefone, celular,perfil_id) 
        VALUES 
        (:nome, :coffito, :matricula, :senha, :idade, :genero, :telefone, :celular, :perfil_id)";
                try {
                    $conexao = $this->conn->getConexao();
                    if ($conexao === null) {
                        $this->conn->reconectar();
                        $conexao = $this->conn->getConexao(); // Recupera a nova instância
                    } else {
                        echo "deu errado!!";
                    }

                    $stmt = $this->conn->getConexao()->prepare($sqlInserirFuncionario);
                    $stmt->bindValue(":nome", $funcionario->getNome(), PDO::PARAM_STR);
                    $stmt->bindValue(":coffito", $funcionario->getCoffito(), PDO::PARAM_STR);
                    $stmt->bindValue(":matricula", $funcionario->getMatricula(), PDO::PARAM_STR);
                    $stmt->bindValue(":senha", $funcionario->getSenha(), PDO::PARAM_STR);
                    $stmt->bindValue(":idade", $funcionario->getIdade(), PDO::PARAM_STR);
                    $stmt->bindValue(":genero", $funcionario->getGenero(), PDO::PARAM_STR);
                    $stmt->bindValue(":telefone", $funcionario->getTelefone(), PDO::PARAM_STR);
                    $stmt->bindValue(":celular", $funcionario->getCelular(), PDO::PARAM_STR);

                    $stmt->bindValue(":perfil_id", $funcionario->getPerfil()->getId(), PDO::PARAM_INT);

                    try {
                        $result = $stmt->execute();
                        var_dump($result);
                    } catch (\PDOException $e) {
                        echo "Erro do PDO: " . $e->getMessage();
                    }
                } catch (\Exception $e) {
                    error_log("Erro ao inserir funcionário: " . $e->getMessage());
                } finally {
                    $this->conn->desconectar();
                }
            }


            public function editarFuncionario(Funcionario $funcionario)
            {
                $sqlEditarFuncionario = "UPDATE funcionarios SET 
            nome=:nome, 
            coffito=:coffito, 
            matricula=:matricula, 
            senha=:senha, 
            idade=:idade, 
            genero=:genero, 
            telefone=:telefone, 
            celular=:celular, 
            perfil_id=:idPerfil
            WHERE id=:id";

                try {
                    if ($this->conn->getConexao() === null) {
                        $this->conn->reconectar();
                    }
                    $stmt = $this->conn->getConexao()->prepare($sqlEditarFuncionario);
                    $stmt->bindValue(":nome", $funcionario->getNome(), PDO::PARAM_STR);
                    $stmt->bindValue(":coffito", $funcionario->getCoffito(), PDO::PARAM_STR);
                    $stmt->bindValue(":matricula", $funcionario->getMatricula(), PDO::PARAM_STR);
                    $stmt->bindValue(":senha", $funcionario->getSenha(), PDO::PARAM_STR);
                    $stmt->bindValue(":idade", $funcionario->getIdade(), PDO::PARAM_STR);
                    $stmt->bindValue(":genero", $funcionario->getGenero(), PDO::PARAM_STR);
                    $stmt->bindValue(":telefone", $funcionario->getTelefone(), PDO::PARAM_STR);
                    $stmt->bindValue(":celular", $funcionario->getCelular(), PDO::PARAM_STR);
                    $stmt->bindValue(":idPerfil", $funcionario->getPerfil()->getId(), PDO::PARAM_INT);
                    $stmt->bindValue(":id", $funcionario->getId(), PDO::PARAM_INT);


                    $stmt->execute();
                } catch (\PDOException $e) {
                    error_log("Erro ao editar funcionário: " . $e->getMessage());
                } finally {
                    $this->conn->desconectar();
                }
            }

            public function excluirFuncionario(int $id)
            {
                $sqlExcluirFuncionario = "DELETE FROM funcionarios WHERE id=:id";

                try {
                    $stmt = $this->conn->getConexao()->prepare($sqlExcluirFuncionario);
                    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                    $stmt->execute();
                } catch (\PDOException $e) {
                    error_log("Erro ao excluir o funcionário: " . $e->getMessage());
                } finally {
                    $this->conn->desconectar();
                }
            }

            public function carregarPorIdFuncionario(int $id)
            {
                $sqlCarregarPorIdFuncionario = "SELECT * FROM funcionarios WHERE id=:id";

                try {
                    if ($this->conn->getConexao() === null) {
                        $this->conn->reconectar();
                    }

                    $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdFuncionario);
                    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

                    $stmt->execute();

                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    if (!$result) {
                        return null; // Funcionário não encontrado
                    }

                    $funcionario = new Funcionario();
                    $funcionario->setId($result['id']);
                    $funcionario->setNome($result['nome']);
                    $funcionario->setCoffito($result['coffito']);
                    $funcionario->setMatricula($result['matricula']);
                    $funcionario->setSenha($result['senha']);
                    $funcionario->setIdade($result['idade']);
                    $funcionario->setGenero($result['genero']);
                    $funcionario->setTelefone($result['telefone']);
                    $funcionario->setCelular($result['celular']);


                    $perfilDAO = new PerfilDAO();
                    $perfil = new Perfil();

                    $perfil = $perfilDAO->carregarPorIdPerfil($result['perfil_id']);

                    $funcionario->setPerfil($perfil);

                    return $funcionario;
                } catch (\PDOException $e) {
                    error_log("Erro ao carregar por id o funcionário: " . $e->getMessage());
                } finally {
                    $this->conn->desconectar();
                }
            }

            public function carregarPorIdFuncionarioJson(int $id)
            {
                $sqlCarregarPorIdFuncionario = "SELECT * FROM funcionarios WHERE id=:id";

                try {
                    if ($this->conn->getConexao() === null) {
                        $this->conn->reconectar();
                    }

                    $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdFuncionario);
                    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

                    $stmt->execute();


                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    if (!$result) {
                        return null; // Funcionário não encontrado
                    }

                    $funcionario = new Funcionario();
                    $funcionario->setId($result['id']);
                    $funcionario->setNome($result['nome']);
                    $funcionario->setCoffito($result['coffito']);
                    $funcionario->setMatricula($result['matricula']);
                    $funcionario->setSenha($result['senha']);
                    $funcionario->setIdade($result['idade']);
                    $funcionario->setGenero($result['genero']);
                    $funcionario->setTelefone($result['telefone']);
                    $funcionario->setCelular($result['celular']);


                    $perfilDAO = new PerfilDAO();
                    $perfil = new Perfil();

                    $perfil = $perfilDAO->carregarPorIdPerfil($result['perfil_id']);

                    $funcionario->setPerfil($perfil);

                    header('Content-Type: application/json');
                    echo json_encode($funcionario->toJson(), JSON_UNESCAPED_UNICODE);
                } catch (\PDOException $e) {
                    error_log("Erro ao carregar por id o funcionário: " . $e->getMessage());
                } finally {
                    $this->conn->desconectar();
                }
            }

            public function listarFuncionarios()
            {
                $sqlListarFuncionarios = "SELECT * FROM funcionarios";

                try {
                    if ($this->conn->getConexao() === null) {
                        $this->conn->reconectar();
                    }

                    $stmt = $this->conn->getConexao()->prepare($sqlListarFuncionarios);
                    $stmt->execute();

                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $funcionarios = [];

                    foreach ($result as $row) {
                        $funcionario = new Funcionario();
                        $funcionario->setId($row['id']);
                        $funcionario->setNome($row['nome']);
                        $funcionario->setCoffito($row['coffito']);
                        $funcionario->setMatricula($row['matricula']);
                        $funcionario->setSenha($row['senha']);
                        $funcionario->setIdade($row['idade']);
                        $funcionario->setGenero($row['genero']);
                        $funcionario->setTelefone($row['telefone']);
                        $funcionario->setCelular($row['celular']);

                        $perfilDAO = new PerfilDAO();
                        $perfil = new Perfil();
                        $perfil = $perfilDAO->carregarPorIdPerfil($row['perfil_id']);

                        $funcionario->setPerfil($perfil);

                        $funcionarios[] = $funcionario;
                    }

                    return $funcionarios;
                } catch (\PDOException $e) {
                    error_log("Erro ao listar funcionários: " . $e->getMessage());
                } finally {
                    $this->conn->desconectar();
                }
            }

            public function listarFuncionariosJson()
            {
                $sqlListarFuncionarios = "SELECT * FROM funcionarios";

                try {
                    if ($this->conn->getConexao() === null) {
                        $this->conn->reconectar();
                    }

                    $stmt = $this->conn->getConexao()->prepare($sqlListarFuncionarios);
                    $stmt->execute();

                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $funcionarios = [];

                    foreach ($result as $row) {
                        $funcionario = new Funcionario();
                        $funcionario->setId($row['id']);
                        $funcionario->setNome($row['nome']);
                        $funcionario->setCoffito($row['coffito']);
                        $funcionario->setMatricula($row['matricula']);
                        $funcionario->setSenha($row['senha']);
                        $funcionario->setIdade($row['idade']);
                        $funcionario->setGenero($row['genero']);
                        $funcionario->setTelefone($row['telefone']);
                        $funcionario->setCelular($row['celular']);

                        $perfilDAO = new PerfilDAO();

                        $funcionario->setPerfil($perfilDAO->carregarPorIdPerfil($row['perfil_id']));
                        $funcionarios[] = $funcionario->toJson();
                    }

                    header('Content-Type: application/json');
                    echo json_encode($funcionarios, JSON_UNESCAPED_UNICODE);
                } catch (\PDOException $e) {
                    error_log("Erro ao listar funcionários: " . $e->getMessage());
                } finally {
                    $this->conn->desconectar();
                }
            }
        }
    }
}
