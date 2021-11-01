<?php

/**
 * Conexão ao banco de dados.
 */
require_once "conexao.php";

/**
 * Verifica a conexão.
 * Se conectado, prossegue para o cadastro.
 * Se não, lança erro.
 */
if (!$mysqli->connect_error) {

    /**
     * Verifica se já existe uma sessão.
     * Se não existir, prossegue para o cadastro.
     * Se existir, redireciona para o index.php.
     */
    session_start();

    if (!isset($_SESSION["login"])) {

        /**
         * Verifica se o formulário está preenchido.
         * Se estiver, prossegue para o cadastro no banco.
         * Se não, carrega o formulário para preenchimento.
         */
        
        if (
            isset($_POST['username']) && isset($_POST['nome']) && isset($_POST['cnpj'])
            && isset($_POST['email']) && isset($_POST['estado']) && isset($_POST['municipio'])
            && isset($_POST['cep']) && isset($_POST['senha'])
        ) {

            /**
             * Instancia variáveis com as informações do formulário
             */
            $username = $_POST['username'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cnpj'];
            $email = $_POST['email'];
            $area = $_POST['area'];
            $estado = $_POST['estado'];
            $municipio = $_POST['municipio'];
            $cep = $_POST['cep'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            //Password Hash: gera um valor único criptografado para cada senha

            /**
             * Cadastrar no banco:
             * 1 - Criar query com parâmetros indefinidos;
             * 2 - Prepare and bind
             * 3 - Executa
             * Se executar, inicia uma sessão
             * Se der erro, lança erro =)
             */
            $query = "INSERT INTO pessoa_juridica (username_pj, nome_pj, cnpj_pj,
                area_pj, municipio_pj, estado_pj, email_pj, senha_pj)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = $mysqli->prepare($query)) {
                $stmt->bind_param(
                    "ssssssss",
                    $username,
                    $nome,
                    $cnpj,
                    $area,
                    $municipio,
                    $estado,
                    $email,
                    $senha
                );

                if ($stmt->execute()) {
                    $_SESSION['login'] = [
                        "username" => $username,
                        "nome" => $nome,
                        "sobrenome" => "",
                        "area" => $area,
                        "tipo" => "J"
                    ];
                    header("Location: index.php");
                    //print_r($_SESSION['login']);
                } else {
                    die("Erro na execução da query: " . $mysqli->error);
                }
            } else {
                die("Erro na preparação do statement: " . $mysqli->error);
            }
        } else {
            include "includes/header.php";
            include "includes/form_cadastrorecrutador.php";
            include "includes/footer.php";
        }
    } else {
        header("Location: index.php");
    }
} else {
    die("Erro ao conectar-se ao banco de dados: " . $mysqli->connect_error);
}

$mysqli->close();