<?php

require_once "Pessoa.php";

class PessoaJuridica extends Pessoa {
    private $cnpj;

    public function __construct($nome, $area, $email, $senha, $cidade, $estado, $cep, $cnpj) {
        parent::__construct($nome, $area, $email, $senha, $cidade, $estado, $cep);
        $this->cnpj = $cnpj;

    }
}