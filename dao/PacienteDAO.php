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

    
}
