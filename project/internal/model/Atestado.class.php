<?php

class Atestado {

    /**
     *
     * @var integer
     */
    private $id;

    /**
     *
     * @var string
     */
    private $datahora;

    /**
     *
     * @var string
     */
    private $periodoInicio = null;

    /**
     *
     * @var string
     */
    private $periodoFim = null;

    /**
     *
     * @var string
     */
    private $pacNome;

    /**
     *
     * @var string
     */
    private $pacEndereco;

    /**
     *
     * @var string
     */
    private $pacTelefone;

    /**
     *
     * @var string
     */
    private $pacEmail;

    /**
     *
     * @var string
     */
    private $pacId;

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

    /**
     *
     * @var string
     */
    private $codAutenticacao = null;

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

    function setDatahora($datahora) {
        $this->datahora = $datahora;
    }

    function setPeriodoInicio($periodoInicio) {
        $this->periodoInicio = $periodoInicio;
    }

    function setPeriodoFim($periodoFim) {
        $this->periodoFim = $periodoFim;
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

    function getPacNome() {
        return $this->pacNome;
    }

    function getPacEndereco() {
        return $this->pacEndereco;
    }

    function getPacTelefone() {
        return $this->pacTelefone;
    }

    function getPacEmail() {
        return $this->pacEmail;
    }

    function getPacId() {
        return $this->pacId;
    }

    function setPacNome($pacNome) {
        $this->pacNome = $pacNome;
    }

    function setPacEndereco($pacEndereco) {
        $this->pacEndereco = $pacEndereco;
    }

    function setPacTelefone($pacTelefone) {
        $this->pacTelefone = $pacTelefone;
    }

    function setPacEmail($pacEmail) {
        $this->pacEmail = $pacEmail;
    }

    function setPacId($pacId) {
        $this->pacId = $pacId;
    }

    function getCodAutenticacao() {
        return $this->codAutenticacao;
    }

    function setCodAutenticacao($codAutenticacao) {
        $this->codAutenticacao = $codAutenticacao;
    }

    function gerarCodAutenticacao() {
        $cod = sha1(uniqid() . date('Y-m-d H:i:s') . $this->pacNome . $this->cid . $this->datahora);
        $this->setCodAutenticacao($cod);
    }

}
