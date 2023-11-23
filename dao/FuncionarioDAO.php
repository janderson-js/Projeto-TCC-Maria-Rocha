<?php 

include "../dataBase/DataBase.php";
include "../models/Perfil.php";
include "../dao/PerfilDAO.php";
include "../dao/EspecialidadeDAO.php";
include "../models/Funcionario.php";


class FuncionarioDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = DataBase::getInstance();
    }

    public function inserirFuncionario(Funcionario $funcionario)
    {
        $sqlInserirFuncionario = "INSERT INTO funcionario (
            nome, coffito, matricula, senha, idade, genero, telefone, celular,
            url_img_perfil, id_perfil, id_especialidade
        ) VALUES (
            :nome, :coffito, :matricula, :senha, :idade, :genero, :telefone, :celular,
            :urlImgPerfil, :idPerfil, :idEspecialidade
        )";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlInserirFuncionario);
            $stmt->bindValue(":nome", $funcionario->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":coffito", $funcionario->getCoffito(), PDO::PARAM_STR);
            $stmt->bindValue(":matricula", $funcionario->getMatricula(), PDO::PARAM_STR);
            $stmt->bindValue(":senha", $funcionario->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(":idade", $funcionario->getIdade(), PDO::PARAM_STR);
            $stmt->bindValue(":genero", $funcionario->getGenero(), PDO::PARAM_STR);
            $stmt->bindValue(":telefone", $funcionario->getTelefone(), PDO::PARAM_STR);
            $stmt->bindValue(":celular", $funcionario->getCelular(), PDO::PARAM_STR);
            $stmt->bindValue(":urlImgPerfil", $funcionario->getUrlImgPerfil(), PDO::PARAM_STR);
            $stmt->bindValue(":idPerfil", $funcionario->getPerfil()->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":idEspecialidade", $funcionario->getEspecialidade()->getId(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erro ao inserir funcionário: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function editarFuncionario(Funcionario $funcionario)
    {
        $sqlEditarFuncionario = "UPDATE funcionario SET 
            nome=:nome, 
            coffito=:coffito, 
            matricula=:matricula, 
            senha=:senha, 
            idade=:idade, 
            genero=:genero, 
            telefone=:telefone, 
            celular=:celular,
            url_img_perfil=:urlImgPerfil, 
            id_perfil=:idPerfil, 
            id_especialidade=:idEspecialidade
            WHERE id=:id";

        try {
            $stmt = $this->conn->getConexao()->prepare($sqlEditarFuncionario);
            $stmt->bindValue(":nome", $funcionario->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":coffito", $funcionario->getCoffito(), PDO::PARAM_STR);
            $stmt->bindValue(":matricula", $funcionario->getMatricula(), PDO::PARAM_STR);
            $stmt->bindValue(":senha", $funcionario->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(":idade", $funcionario->getIdade(), PDO::PARAM_STR);
            $stmt->bindValue(":genero", $funcionario->getGenero(), PDO::PARAM_STR);
            $stmt->bindValue(":telefone", $funcionario->getTelefone(), PDO::PARAM_STR);
            $stmt->bindValue(":celular", $funcionario->getCelular(), PDO::PARAM_STR);
            $stmt->bindValue(":urlImgPerfil", $funcionario->getUrlImgPerfil(), PDO::PARAM_STR);
            $stmt->bindValue(":idPerfil", $funcionario->getPerfil()->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":idEspecialidade", $funcionario->getEspecialidade()->getId(), PDO::PARAM_INT);
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
        $sqlExcluirFuncionario = "DELETE FROM funcionario WHERE id=:id";

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
        $sqlCarregarPorIdFuncionario = "SELECT * FROM funcionario WHERE id=:id";

        try {
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
            $funcionario->setUrlImgPerfil($result['url_img_perfil']);

            // Carregar DAO Perfil e Especialidade
            $perfilDAO = new PerfilDAO();
            $especialidadeDAO = new EspecialidadeDAO();
            // Carregar Models Perfil e Especialidade
            $perfil = new Perfil();
            $especialidade = new Especialidade();

            $perfil = $perfilDAO->carregarPorIdPerfil($result['id_perfil']);
            $especialidade = $especialidadeDAO->carregaPorIdEspecialidade($result['id_especialidade']);

            $funcionario->setPerfil($perfil);
            $funcionario->setEspecialidade($especialidade);

            return $funcionario;
        } catch (\PDOException $e) {
            error_log("Erro ao carregar por id o funcionário: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }

    public function listarFuncionarios()
    {
        $sqlListarFuncionarios = "SELECT * FROM funcionario";

        try {
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
                $funcionario->setUrlImgPerfil($row['url_img_perfil']);

                // Carregar DAO Perfil e Especialidade
                $perfilDAO = new PerfilDAO();
                $especialidadeDAO = new EspecialidadeDAO();
                // Carregar Models Perfil e Especialidade
                $perfil = new Perfil();
                $especialidade = new Especialidade();
                $perfil = $perfilDAO->carregarPorIdPerfil($row['id_perfil']);
                $especialidade = $especialidadeDAO->carregaPorIdEspecialidade($row['id_especialidade']);

                $funcionario->setPerfil($perfil);
                $funcionario->setEspecialidade($especialidade);

                $funcionarios[] = $funcionario;
            }

            return $funcionarios;
        } catch (\PDOException $e) {
            error_log("Erro ao listar funcionários: " . $e->getMessage());
        } finally {
            $this->conn->desconectar();
        }
    }
}
