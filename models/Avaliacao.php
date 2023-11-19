<?php

class Avaliacao{
    private int $id;
    private DateTime $dataAvaliacao;
    private string $horaAgendamento;
    private string $observacoes;
    private string $diagnosticoInicial;
    private string $resultadoTesteExames;

    private Paciente $paciente;
    private Funcionario $funcionario;
    

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDataAvaliacao(): DateTime
    {
        return $this->dataAvaliacao;
    }

    public function setDataAvaliacao(DateTime $dataAvaliacao): self
    {
        $this->dataAvaliacao = $dataAvaliacao;

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

    public function getObservacoes(): string
    {
        return $this->observacoes;
    }

    public function setObservacoes(string $observacoes): self
    {
        $this->observacoes = $observacoes;

        return $this;
    }

    public function getDiagnosticoInicial(): string
    {
        return $this->diagnosticoInicial;
    }

    public function setDiagnosticoInicial(string $diagnosticoInicial): self
    {
        $this->diagnosticoInicial = $diagnosticoInicial;

        return $this;
    }

    public function getResultadoTesteExames(): string
    {
        return $this->resultadoTesteExames;
    }

    public function setResultadoTesteExames(string $resultadoTesteExames): self
    {
        $this->resultadoTesteExames = $resultadoTesteExames;

        return $this;
    }

    public function getPaciente(): Paciente
    {
        return $this->paciente;
    }

    public function setPaciente(Paciente $paciente): self
    {
        $this->paciente = $paciente;

        return $this;
    }

    public function getFuncionario(): Funcionario
    {
        return $this->funcionario;
    }

    public function setFuncionario(Funcionario $funcionario): self
    {
        $this->funcionario = $funcionario;

        return $this;
    }
}