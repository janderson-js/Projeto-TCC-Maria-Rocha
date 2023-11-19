<?php
class Funcionario{
    private int $id;
    private string $nome;
    private string $coffito;
    private string $matricula;
    private string $senha;
    private string $idade;
    private string $genero;
    private string $telefone;
    private string $celular;

    private Perfil $perfil;
    private Especialidade $especialidade;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCoffito(): string
    {
        return $this->coffito;
    }

    public function setCoffito(string $coffito): self
    {
        $this->coffito = $coffito;

        return $this;
    }

    public function getMatricula(): string
    {
        return $this->matricula;
    }

    public function setMatricula(string $matricula): self
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    public function getIdade(): string
    {
        return $this->idade;
    }

    public function setIdade(string $idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getCelular(): string
    {
        return $this->celular;
    }

    public function setCelular(string $celular): self
    {
        $this->celular = $celular;

        return $this;
    }

    public function getPerfil(): Perfil
    {
        return $this->perfil;
    }

    public function setPerfil(Perfil $perfil): self
    {
        $this->perfil = $perfil;

        return $this;
    }

    public function getEspecialidade(): Especialidade
    {
        return $this->especialidade;
    }

    public function setEspecialidade(Especialidade $especialidade): self
    {
        $this->especialidade = $especialidade;

        return $this;
    }
}