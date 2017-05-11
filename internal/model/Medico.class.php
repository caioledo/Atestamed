<?php

class Medico {

    /**
     *
     * @var integer
     */
    private $id;

    /**
     *
     * @var string
     */
    private $nome;

    /**
     *
     * @var string
     */
    private $crmUf;

    /**
     *
     * @var string
     */
    private $crmNum;

    /**
     *
     * @var string
     */
    private $especialidade;
    

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCrmUf() {
        return $this->crmUf;
    }

    function getCrmNum() {
        return $this->crmNum;
    }

    function getEspecialidade() {
        return $this->especialidade;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCrmUf($crmUf) {
        $this->crmUf = $crmUf;
    }

    function setCrmNum($crmNum) {
        $this->crmNum = $crmNum;
    }

    function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

}