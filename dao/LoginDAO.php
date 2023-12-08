<?php

require_once(dirname(__FILE__) . "/../dataBase/DataBase.php");
require_once(dirname(__FILE__) . "/../models/Login.php");
require_once(dirname(__FILE__) . "/../dao/PerfilDAO.php");

class LoginDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = DataBase::getInstance();
    }

    public function Login(Login $login)
    {
        $sqlInserirLogin = "SELECT 'paciente' as usuario, id, nome, NULL as perfil_id
        FROM pacientes
        WHERE login=:login AND senha=:senha
        
        UNION
        
        SELECT 'funcionario' as usuario, id, nome, perfil_id
        FROM funcionarios
        WHERE matricula=:login AND senha=:senha";

        try {
            if($this->conn->getConexao() === null){
                $this->conn->reconectar();
            }

            $stmt = $this->conn->getConexao()->prepare($sqlInserirLogin);
            $stmt->bindValue(":login", $login->getLogin(), PDO::PARAM_STR);
            $stmt->bindValue(":senha", $login->getSenha(), PDO::PARAM_STR);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            
            if (!$result) {
                return null; 
            }
            $pDAO = new PerfilDAO();
            $perfil = $pDAO->carregarPorIdPerfil($result["perfil_id"]);
            $userLogado = [
                "id"=> $result["id"],
                "nome"=> $result["nome"],
                "perfil"=> $perfil->getTitulo(),
                "usuario"=> $result["usuario"],
            ];

            return $userLogado;
            
        } catch (\PDOException $e) {
            echo("Erro ao inserir Login: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
}
