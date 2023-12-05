<?php

class Paciente{

    private int $id;
    private string $nome;
    private int $idade;
    private string $cpf;
    private string $login;
    private string $senha;
    private string $genero;
    private string $profissao;
    private string $telefone;
    private string $celular;
    private string $dataNascimento;

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

    public function getIdade(): int
    {
        return $this->idade;
    }

    public function setIdade(int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

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

    public function getGenero(): string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getProfissao(): string
    {
        return $this->profissao;
    }

    public function setProfissao(string $profissao): self
    {
        $this->profissao = $profissao;

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

    public function setDataNascimento(string $dataNascimento): self
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }


    public function toJson() {
        $dataFormatada = date("d/m/Y", strtotime($this->getDataNascimento()));
        return [
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'idade' => $this->getIdade(),
            'cpf' => $this->getCpf(),
            'login' => $this->getLogin(),
            'senha' => $this->getSenha(),
            'genero' => $this->getGenero(),
            'profissao' => $this->getProfissao(),
            'telefone' => $this->getTelefone(),
            'celular' => $this->getCelular(),
            'dataNascimento' => $dataFormatada,
        ];
    }
}