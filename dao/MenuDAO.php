<?php

include_once(dirname(__FILE__) . "/../dataBase/DataBase.php");
include_once(dirname(__FILE__) . "/../models/Menu.php");

class MenuDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = DataBase::getInstance();
    }

    public function inserirMenu(Menu $menu)
    {

        $sqlInserirMenu = "INSERT INTO menu (titulo, descricao, url_menu) VALUES
        (:titulo, :descricao, :url_menu)";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirMenu);
            $stmt->bindValue(":titulo", $menu->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $menu->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(":url_menu", $menu->getUrl(), PDO::PARAM_STR);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao inserir Menu:" . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function editarMenu(Menu $menu)
    {

        $sqlEditarMenu = "UPDATE menu SET 
        titulo=':titulo', 
        descricao=':descricao',
        url_menu=':url_menu'
        WHERE id=':id'";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarMenu);
            $stmt->bindValue(":titulo", $menu->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $menu->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(":url_menu", $menu->getUrl(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $menu->getId(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao editar Menu:" . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function excluirMenu(int $id)
    {

        $sqlExcluirMenu = "DELETE FROM menu WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlExcluirMenu);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao excluir Menu: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function carregaPorIdMenu(int $id)
    {

        $sqlCarregaPorIdMenu = "SELECT * FROM menu WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregaPorIdMenu);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);

            foreach ($resul as $row) {
                $menu[] = [
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'descricao' => $row['descricao'],
                    'url_menu' => $row['url_menu']
                ];
            }
            return $menu;
        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o Menu: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function carregaPorIdMenuJson(int $id)
    {

        $sqlCarregaPorIdMenu = "SELECT * FROM menu WHERE id=:id";
        
        try {
            $stmt = $this->conn->getConexao()->prepare($sqlCarregaPorIdMenu);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);

            $menus = [];
            foreach ($resul as $row) {
                $m = new Menu();
                $m->setId($row['id']);
                $m->setTitulo($row['titulo']);
                $m->setDescricao($row['descricao']);
                $m->setUrl($row['url_menu']);

                $menus[] = $m->toJson();
            }
            // Retornar a resposta JSON corretamente
            header('Content-Type: application/json');
            echo json_encode($menus, JSON_UNESCAPED_UNICODE);

        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o Menu: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }


    public function listarMenu()
    {

        $sqlListarMenu = "SELECT * FROM menu";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarMenu);
            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);

            foreach ($resul as $row) {
                $menus[] = [
                    'id' => $row['id'],
                    'titulo' => $row['titulo'],
                    'descricao' => $row['descricao'],
                    'url_menu' => $row['url_menu']
                ];
            }
            return $menus;
        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o Menu: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function listarMenuJson()
    {

        $sqlListarMenu = "SELECT * FROM menu";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlListarMenu);
            $stmt->execute();

            $resul = $stmt->fetchALL(PDO::FETCH_ASSOC);

            $menus = [];
            foreach ($resul as $row) {
                $m = new Menu();
                $m->setId($row['id']);
                $m->setTitulo($row['titulo']);
                $m->setDescricao($row['descricao']);
                $m->setUrl($row['url_menu']);

                $menus[] = $m->toJson();
            }
            // Retornar a resposta JSON corretamente
            header('Content-Type: application/json');
            echo json_encode($menus, JSON_UNESCAPED_UNICODE);
        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o Menu: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
}
