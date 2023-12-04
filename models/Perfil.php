<?php

class Perfil{
    
    private int $id;
    private string $titulo;
    private string $descricao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }
    
    public function toJson() {
        return [
            'id' => $this->getId(),
            'titulo' => $this->getTitulo(),
            'descricao' => $this->getDescricao(),
            'ação' => '<button class="btn btn-warning btn-editar" onclick="editarDadoDataTable('.$this->getId().')" data-id="2">Editar</button> <button class="btn btn-danger btn-excluir" onclick="excluirDadoDataTable('.$this->getId().')" data-id="2">Excluir</button>',
        ];
    }

    public function toJsonNoButton() {
        return [
            'id' => $this->getId(),
            'titulo' => $this->getTitulo(),
            'descricao' => $this->getDescricao(),
        ];
    }
    
}