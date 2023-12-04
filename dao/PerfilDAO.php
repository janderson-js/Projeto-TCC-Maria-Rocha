<?php

include_once(dirname(__FILE__) . "/../dataBase/DataBase.php");
include_once(dirname(__FILE__) . "/../models/Perfil.php");

class PerfilDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = DataBase::getInstance();
    }

    public function inserirPerfil(Perfil $perfil)
    {
        $sqlInserirPerfil = "INSERT INTO perfil (titulo, descricao) VALUES (:titulo, :descricao)";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirPerfil);
            $stmt->bindValue(":titulo", $perfil->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $perfil->getDescricao(), PDO::PARAM_STR);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao inserir perfil: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function editarPerfil(Perfil $perfil)
    {
        $sqlEditarPerfil = "UPDATE perfil SET titulo=:titulo, descricao=:descricao WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarPerfil);
            $stmt->bindValue(":titulo", $perfil->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $perfil->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $perfil->getId(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao editar perfil: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function excluirPerfil(int $id)
    {
        $sqlExcluirPerfil = "DELETE FROM perfil WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirPerfil);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao excluir o perfil: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function carregarPorIdPerfil(int $id)
    {
        $sqlCarregarPorIdPerfil = "SELECT * FROM perfil WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregarPorIdPerfil);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return null; // Perfil não encontrado
            }

            $perfil = new Perfil();
            $perfil->setId($result['id']);
            $perfil->setTitulo($result['titulo']);
            $perfil->setDescricao($result['descricao']);

            return $perfil;
        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o perfil: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function listarPerfis()
    {
        $sqlListarPerfis = "SELECT * FROM perfil";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarPerfis);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $perfis = [];

            foreach ($result as $row) {
                $perfil = new Perfil();
                $perfil->setId($row['id']);
                $perfil->setTitulo($row['titulo']);
                $perfil->setDescricao($row['descricao']);

                $perfis[] = $perfil;
            }

            return $perfis;
        } catch (\PDOException $e) {
            error_log("Erro ao listar perfis: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function listarPerfisJson()
    {
        $sqlListarPerfis = "SELECT * FROM perfil";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarPerfis);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $perfis = [];



            foreach ($result as $row) {
                $perfil = new Perfil();
                $perfil->setId($row['id']);
                $perfil->setTitulo($row['titulo']);
                $perfil->setDescricao($row['descricao']);
            
                $perfis[] = $perfil->toJson();
            }

            // Retornar a resposta JSON corretamente
            header('Content-Type: application/json');
            echo json_encode($perfis, JSON_UNESCAPED_UNICODE);
        } catch (\PDOException $e) {
            error_log("Erro ao listar perfis Json: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
}
