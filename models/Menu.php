<?php

class Menu{
    private int $id;
    private string $titulo;
    private string $descricao;
    private string $url;  

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function toJson() {
        return [
            'id' => $this->getId(),
            'titulo' => $this->getTitulo(),
            'descricao' => $this->getDescricao(),
            'url' => $this->getUrl(),
            'ação' => '<button class="btn btn-warning btn-editar" onclick="editarDadoDataTable('.$this->getId().')" data-id="2">Editar</button> <button class="btn btn-danger btn-excluir" onclick="excluirDadoDataTable('.$this->getId().')" data-id="2">Excluir</button>',
        ];
    }

    public function toJsonNoButton() {
        return [
            'id' => $this->getId(),
            'titulo' => $this->getTitulo(),
            'descricao' => $this->getDescricao(),
            'url' => $this->getUrl(),
        ];
    }
}