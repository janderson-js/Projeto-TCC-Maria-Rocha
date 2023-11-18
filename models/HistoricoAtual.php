<?php

class HistoricoAtual{
    private int $id;
    private string $dataInicioSintomas;
    private string $fatoresDesencadeiamSintomas;
    private int $nivelDor;
    private string $localizacaoDor;


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
}