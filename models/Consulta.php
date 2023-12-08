<?php

class Consulta{
    private  $id;
    private  $data;
    private  $hora;
    private string $observacoesEspecificas;
    private string $procedimentosOuTratamentosRealizados;

    private Paciente $paciente;
    private Funcionario $funcionario;

    

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;

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