<?php

include "../dataBase/DataBase.php";
include "../models/Paciente.php";

class PacienteDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = DataBase::getInstance();
    }

    public function inserirPaciente(Paciente $paciente)
    {
        $sqlInserirPaciente = "INSERT INTO paciente (
            nome, idade, cpf, login, senha, genero, profissao, telefone, celular,
            queixa_principal, url_img_perfil
        ) VALUES (
            :nome, :idade, :cpf, :login, :senha, :genero, :profissao, :telefone, :celular,
            :queixaPrincipal, :urlImgPerfil
        )";

        try {
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
            $stmt->bindValue(":queixaPrincipal", $paciente->getQueixaPrincipal(), PDO::PARAM_STR);
            $stmt->bindValue(":urlImgPerfil", $paciente->getUrlImgPerfil(), PDO::PARAM_STR);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao inserir paciente: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function editarPaciente(Paciente $paciente)
    {
        $sqlEditarPaciente = "UPDATE paciente SET 
            nome=:nome, 
            idade=:idade, 
            cpf=:cpf, 
            login=:login, 
            senha=:senha, 
            genero=:genero, 
            profissao=:profissao, 
            telefone=:telefone, 
            celular=:celular,
            queixa_principal=:queixaPrincipal, 
            url_img_perfil=:urlImgPerfil
            WHERE id=:id";

        try {
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
            $stmt->bindValue(":queixaPrincipal", $paciente->getQueixaPrincipal(), PDO::PARAM_STR);
            $stmt->bindValue(":urlImgPerfil", $paciente->getUrlImgPerfil(), PDO::PARAM_STR);
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
        $sqlExcluirPaciente = "DELETE FROM paciente WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirPaciente);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao excluir o paciente: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function carregarPorIdPaciente(int $id)
    {
        $sqlCarregarPorIdPaciente = "SELECT * FROM paciente WHERE id=:id";

        try {
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
            $paciente->setQueixaPrincipal($result['queixa_principal']);
            $paciente->setUrlImgPerfil($result['url_img_perfil']);

            return $paciente;
        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o paciente: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function listarPacientes()
    {
        $sqlListarPacientes = "SELECT * FROM paciente";

        try {
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
                $paciente->setQueixaPrincipal($row['queixa_principal']);
                $paciente->setUrlImgPerfil($row['url_img_perfil']);

                $pacientes[] = $paciente;
            }

            return $pacientes;
        } catch (\PDOException $e) {
            error_log("Erro ao listar pacientes: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
}