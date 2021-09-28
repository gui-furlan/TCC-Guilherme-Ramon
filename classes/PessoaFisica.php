<?php

require_once "Pessoa.php";

class PessoaFisica extends Pessoa {
    private $sobrenome;
    private $cpf;
    private $nascimento;
    private $sexo;

    public function __construct($nome, $area, $email, $senha, $cidade, $estado, $cep, $sobrenome, $cpf, $nascimento, $sexo) {
        parent::__construct($nome, $area, $email, $senha, $cidade, $estado, $cep);
        $this->sobrenome = $sobrenome;
        $this->cpf = $cpf;
        $this->nascimento = $nascimento;
        $this->sexo = $sexo;

    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }
}