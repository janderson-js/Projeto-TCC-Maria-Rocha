<?php

class Consulta{
    private int $id;
    private string $data;
    private string $hora;
    private string $tipo;
    private string $observacoesEspecificas;
    private string $procedimentosOuTratamentosRealizados;

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

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getHora(): string
    {
        return $this->hora;
    }

    public function setHora(string $hora): self
    {
        $this->hora = $hora;

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

    public function getObservacoesEspecificas(): string
    {
        return $this->observacoesEspecificas;
    }

    public function setObservacoesEspecificas(string $observacoesEspecificas): self
    {
        $this->observacoesEspecificas = $observacoesEspecificas;

        return $this;
    }

    public function getProcedimentosOuTratamentosRealizados(): string
    {
        return $this->procedimentosOuTratamentosRealizados;
    }

    public function setProcedimentosOuTratamentosRealizados(string $procedimentosOuTratamentosRealizados): self
    {
        $this->procedimentosOuTratamentosRealizados = $procedimentosOuTratamentosRealizados;

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