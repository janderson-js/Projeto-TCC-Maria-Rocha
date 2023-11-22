<?php

class HistoricoMedico{
    private int $id;
    private string $doencasPrevias;
    private string $cirurgias;
    private string $alergias;
    private string $medicamentoEmUso;
    private string $historicoFamiliarRelevante;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDoencasPrevias(): string
    {
        return $this->doencasPrevias;
    }

    public function setDoencasPrevias(string $doencasPrevias): self
    {
        $this->doencasPrevias = $doencasPrevias;

        return $this;
    }

    public function getCirurgias(): string
    {
        return $this->cirurgias;
    }

    public function setCirurgias(string $cirurgias): self
    {
        $this->cirurgias = $cirurgias;

        return $this;
    }

    public function getAlergias(): string
    {
        return $this->alergias;
    }

    public function setAlergias(string $alergias): self
    {
        $this->alergias = $alergias;

        return $this;
    }

    public function getMedicamentoEmUso(): string
    {
        return $this->medicamentoEmUso;
    }

    public function setMedicamentoEmUso(string $medicamentoEmUso): self
    {
        $this->medicamentoEmUso = $medicamentoEmUso;

        return $this;
    }

    public function getHistoricoFamiliarRelevante(): string
    {
        return $this->historicoFamiliarRelevante;
    }

    public function setHistoricoFamiliarRelevante(string $historicoFamiliarRelevante): self
    {
        $this->historicoFamiliarRelevante = $historicoFamiliarRelevante;

        return $this;
    }
}