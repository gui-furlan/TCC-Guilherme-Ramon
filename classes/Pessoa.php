<?php

class Pessoa {
    private $nome;
    private $area;
    private $email;
    private $senha;
    private $bio;
    private $cidade;
    private $estado;
    private $cep;

    public function __construct($nome, $area, $email, $senha, $municipio, $estado, $cep) {
        $this->nome = $nome;
        $this->area = $area;
        $this->email = $email;
        $this->senha = $senha;
        $this->bio = "";
        $this->municipio = $municipio;
        $this->estado = $estado;
        $this->cep = $cep;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setArea($area) {
        $this->area = $area;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setBio($bio) {
        $this->bio = $bio;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }
}