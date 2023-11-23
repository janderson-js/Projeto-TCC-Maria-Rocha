<?php

class Agendamento{
    private int $id;
    private string $tipo;
    private string $dataAgendamento;
    private string $horaAgendamento;
    private string $dataRegistroAgendamento;
    private string $dataAlteracao;
    private string $quemRegistrou;
    private string $quemAlterou;
    private string $statusAgendamento;
    private string $cor; 

    private Consulta $consulta;
    private Avaliacao $avaliacao;

    

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getDataAgendamento(): string
    {
        return $this->dataAgendamento;
    }

    public function setDataAgendamento(string $dataAgendamento): self
    {
        $this->dataAgendamento = $dataAgendamento;

        return $this;
    }

    public function getHoraAgendamento(): string
    {
        return $this->horaAgendamento;
    }

    public function setHoraAgendamento(string $horaAgendamento): self
    {
        $this->horaAgendamento = $horaAgendamento;

        return $this;
    }

    public function getDataRegistroAgendamento(): string
    {
        return $this->dataRegistroAgendamento;
    }

    public function setDataRegistroAgendamento(string $dataRegistroAgendamento): self
    {
        $this->dataRegistroAgendamento = $dataRegistroAgendamento;

        return $this;
    }

    public function getDataAlteracao(): string
    {
        return $this->dataAlteracao;
    }

    public function setDataAlteracao(string $dataAlteracao): self
    {
        $this->dataAlteracao = $dataAlteracao;

        return $this;
    }

    public function getQuemRegistrou(): string
    {
        return $this->quemRegistrou;
    }

    public function setQuemRegistrou(string $quemRegistrou): self
    {
        $this->quemRegistrou = $quemRegistrou;

        return $this;
    }

    public function getQuemAlterou(): string
    {
        return $this->quemAlterou;
    }

    public function setQuemAlterou(string $quemAlterou): self
    {
        $this->quemAlterou = $quemAlterou;

        return $this;
    }

    public function getStatusAgendamento(): string
    {
        return $this->statusAgendamento;
    }

    public function setStatusAgendamento(string $statusAgendamento): self
    {
        $this->statusAgendamento = $statusAgendamento;

        return $this;
    }

    public function getCor(): string
    {
        return $this->cor;
    }

    public function setCor(string $cor): self
    {
        $this->cor = $cor;

        return $this;
    }

    public function getConsulta(): Consulta
    {
        return $this->consulta;
    }

    public function setConsulta(Consulta $consulta): self
    {
        $this->consulta = $consulta;

        return $this;
    }

    public function getAvaliacao(): Avaliacao
    {
        return $this->avaliacao;
    }

    public function setAvaliacao(Avaliacao $avaliacao): self
    {
        $this->avaliacao = $avaliacao;

        return $this;
    }
}