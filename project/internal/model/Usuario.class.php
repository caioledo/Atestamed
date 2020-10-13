<?php

class Usuario {

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
    private $login;

    /**
     *
     * @var string
     */
    private $senha;

    /**
     *
     * @var TipoUsuario
     */
    private $tipo;

    /**
     *
     * @var integer
     */
    private $medico = null;

    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getMedico() {
        return $this->medico;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setTipo(TipoUsuario $tipo) {
        $this->tipo = $tipo;
    }

    function setMedico($medico) {
        $this->medico = $medico;
    }

}