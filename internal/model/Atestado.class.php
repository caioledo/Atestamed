<?php

class Atestado {

    /**
     *
     * @var integer
     */
    private $id;

    /**
     *
     * @var DateTime
     */
    private $datahora;

    /**
     *
     * @var DateTime
     */
    private $periodoInicio = null;

    /**
     *
     * @var DateTime
     */
    private $periodoFim = null;

    /**
     *
     * @var Paciente
     */
    private $paciente;

    /**
     *
     * @var Medico
     */
    private $medico;

    /**
     *
     * @var string
     */
    private $cid = null;

    /**
     *
     * @var string
     */
    private $observacoes = null;

    
    function getId() {
        return $this->id;
    }

    function getDatahora() {
        return $this->datahora;
    }

    function getPeriodoInicio() {
        return $this->periodoInicio;
    }

    function getPeriodoFim() {
        return $this->periodoFim;
    }

    function getPaciente() {
        return $this->paciente;
    }

    function getMedico() {
        return $this->medico;
    }

    function getCid() {
        return $this->cid;
    }

    function getObservacoes() {
        return $this->observacoes;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDatahora(DateTime $datahora) {
        $this->datahora = $datahora;
    }

    function setPeriodoInicio(DateTime $periodoInicio) {
        $this->periodoInicio = $periodoInicio;
    }

    function setPeriodoFim(DateTime $periodoFim) {
        $this->periodoFim = $periodoFim;
    }

    function setPaciente(Paciente $paciente) {
        $this->paciente = $paciente;
    }

    function setMedico(Medico $medico) {
        $this->medico = $medico;
    }

    function setCid($cid) {
        $this->cid = $cid;
    }

    function setObservacoes($observacoes) {
        $this->observacoes = $observacoes;
    }

}