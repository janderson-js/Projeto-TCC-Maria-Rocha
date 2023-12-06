<?php

class Anamnese{
    private int $id;
    private string $dataInicioSintomas;
    private string $fatoresDesencadeiamSintomas;
    private int $nivelDor;
    private string $localizacaoDor;
    private string $tratamentoAnterior;
    private string $motivoTratamentoAnterior;
    private string $resultadoTratamentoAnterior;
    private string $problemaFisicoRecorrente;
    private string $doencasPrevias;
    private string $cirurgias;
    private string $alergias;
    private string $medicamentoEmUso;
    private string $historicoFamiliarRelevante;
    private  $cpf;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDataInicioSintomas(): string
    {
        return $this->dataInicioSintomas;
    }

    public function setDataInicioSintomas(string $dataInicioSintomas): self
    {
        $this->dataInicioSintomas = $dataInicioSintomas;

        return $this;
    }

    public function getFatoresDesencadeiamSintomas(): string
    {
        return $this->fatoresDesencadeiamSintomas;
    }

    public function setFatoresDesencadeiamSintomas(string $fatoresDesencadeiamSintomas): self
    {
        $this->fatoresDesencadeiamSintomas = $fatoresDesencadeiamSintomas;

        return $this;
    }

    public function getNivelDor(): int
    {
        return $this->nivelDor;
    }

    public function setNivelDor(int $nivelDor): self
    {
        $this->nivelDor = $nivelDor;

        return $this;
    }

    public function getLocalizacaoDor(): string
    {
        return $this->localizacaoDor;
    }

    public function setLocalizacaoDor(string $localizacaoDor): self
    {
        $this->localizacaoDor = $localizacaoDor;

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

    public function getMotivoTratamentoAnterior(): string
    {
        return $this->motivoTratamentoAnterior;
    }

    public function setMotivoTratamentoAnterior(string $motivoTratamentoAnterior): self
    {
        $this->motivoTratamentoAnterior = $motivoTratamentoAnterior;

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

    public function getCpf() 
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function toJson() {
        $dataFormatada = date("d/m/Y", strtotime($this->getDataInicioSintomas()));
        return [
            'id' => $this->getId(),
            'dataInicioSintomas' => $dataFormatada,
            'fatoresDesencadeiamSintomas' => $this->getFatoresDesencadeiamSintomas(),
            'nivelDor' => $this->getNivelDor(),
            'localizacaoDor' => $this->getLocalizacaoDor(),
            'tratamentoAnterior' => $this->getTratamentoAnterior(),
            'motivoTratamentoAnterior' => $this->getMotivoTratamentoAnterior(),
            'resultadoTratamentoAnterior' => $this->getResultadoTratamentoAnterior(),
            'problemaFisicoRecorrente' => $this->getProblemaFisicoRecorrente(),
            'doencasPrevias' => $this->getDoencasPrevias(),
            'cirurgias' => $this->getCirurgias(),
            'alergias' => $this->getAlergias(),
            'medicamentoEmUso' => $this->getMedicamentoEmUso(),
            'historicoFamiliarRelevante' => $this->getHistoricoFamiliarRelevante(),
            'cpf' => $this->getCpf()
        ];
    }


}