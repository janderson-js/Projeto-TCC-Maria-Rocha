<?php

class HisotoricoFisioterapeutico{
    private int $id;
    private string $tratamentoAnterior;
    private string $motivoTratamentoAnterior;
    private string $resultadoTratamentoAnterior;
    private string $problemaFisicoRecorrente;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTratamentoAnterior(): string
    {
        return $this->tratamentoAnterior;
    }

    public function setTratamentoAnterior(string $tratamentoAnterior): self
    {
        $this->tratamentoAnterior = $tratamentoAnterior;

        return $this;
    }

    public function getResultadoTratamentoAnterior(): string
    {
        return $this->resultadoTratamentoAnterior;
    }

    public function setResultadoTratamentoAnterior(string $resultadoTratamentoAnterior): self
    {
        $this->resultadoTratamentoAnterior = $resultadoTratamentoAnterior;

        return $this;
    }

    public function getProblemaFisicoRecorrente(): string
    {
        return $this->problemaFisicoRecorrente;
    }

    public function setProblemaFisicoRecorrente(string $problemaFisicoRecorrente): self
    {
        $this->problemaFisicoRecorrente = $problemaFisicoRecorrente;

        return $this;
    }

    public function getMotivoTratamentoAnterior(): string
    {
        return $this->motivoTratamentoAnterior;
    }

    public function setMotivoTratamentoAnterior(string $motivoTratamentoAnterior): self
    {
        $this->motivoTratamentoAnterior = $motivoTratamentoAnterior;

        return $this;
    }
}