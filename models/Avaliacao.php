<?php

class Avaliacao{
    private  $id;
    private  $dataAvaliacao;
    private  $horaAvaliacao;
    private string $observacoes;
    private string $diagnosticoInicial;
    private string $resultadoTesteExames;

    private Paciente $paciente;
    private Funcionario $funcionario;
    

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getDataAvaliacao()
    {
        return $this->dataAvaliacao;
    }

    public function setDataAvaliacao($dataAvaliacao)
    {
        $this->dataAvaliacao = $dataAvaliacao;

        return $this;
    }

    public function getHoraAvaliacao()
    {
        return $this->horaAvaliacao;
    }

    public function setHoraAvaliacao($horaAvaliacao)
    {
        $this->horaAvaliacao = $horaAvaliacao;

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