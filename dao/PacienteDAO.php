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
            nome, idade, cpf, login, senha, genero, profissao, telefone, celular, queixa_principal
        ) VALUES (
            :nome, :idade, :cpf, :login, :senha, :genero, :profissao, :telefone, :celular, :queixaPrincipal
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
            $stmt->bindValue(":queixa_principal", $paciente->getQueixaPrincipal(), PDO::PARAM_STR);

            // Adicione aqui o código para salvar os objetos relacionados (HistoricoAtual, HistoricoMedico, HistoricoFisioterapeutico)

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
            nome=:nome, idade=:idade, cpf=:cpf, login=:login, senha=:senha, genero=:genero, 
            profissao=:profissao, telefone=:telefone, celular=:celular, queixaPrincipal=:queixaPrincipal
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
            $stmt->bindValue(":id", $paciente->getId(), PDO::PARAM_INT);

            // Adicione aqui o código para atualizar os objetos relacionados (HistoricoAtual, HistoricoMedico, HistoricoFisioterapeutico)

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao editar paciente: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    
}
