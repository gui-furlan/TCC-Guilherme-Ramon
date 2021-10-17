<?php

/**
 * Conexão ao banco de dados
 */

$servername = "localhost";
$username = "guilherme";
$password = "abc123";
$dbname = "tcc2";

$mysqli = new mysqli($servername, $username, $password, $dbname);

/**
 * Verifica erros de conexão com o banco.
 * Se não tiver, prossegue
 * Se tiver, lança erro
 */
if (!$mysqli->connect_error) {

    session_start();

    /**
     * Verifica se já existe sessão.
     * Se não existir, prossegue para o login
     * Se existir, vai para index.php
     */
    if (!isset($_SESSION['login'])) {

        /**
         * Verifica o preenchimento do formulário
         * Se estiver preenchido, pega as informações do POST
         * Se não, redireciona para o index.php
         */
        if (isset($_POST['username']) && isset($_POST['senha']) && isset($_POST['tipo_conta'])) {
            $formUsername = $_POST['username'];
            $formSenha = $_POST['senha'];
            $formTipo = $_POST['tipo_conta'];

            /**
             * Verifica o tipo da conta selecionado pelo usuário
             */
            if ($formTipo == "f") {

                /**
                 * Se for "F" -> Pessoa Física
                 * Cria uma query que busca a pessoa pelo username
                 * Confere para ver se username e senha (e hash da senha) batem
                 * Cria uma sessão contendo: username, nome, sobrenome, area e tipo de conta
                 */
                $query = "SELECT * FROM pessoa_fisica WHERE username_pf = '$formUsername';";

                /**
                 * Executa pra ver se existe alguém com esse username.
                 * Se não existe, retorna o erro
                 * Se existe, prossegue
                 */
                if (!$row = $mysqli->query($query)->fetch_assoc()) {
                    $erro = "Username, senha ou tipo de conta inválido(s)";
                } else {
                    /**
                     * Verifica se a senha informada bate com o hash da senha no banco
                     * Se sim, cria a sessão.
                     * Se não, retorna o erro
                     */
                    if ($formUsername == $row["username_pf"] && password_verify($formSenha, $row["senha_pf"])) {

                        $_SESSION["login"] = [
                            "username" => $row["username_pf"],
                            "nome" => $row["nome_pf"],
                            "sobrenome" => $row["sobrenome_pf"],
                            "area" => $row["area_pf"],
                            "tipo" => "F"
                        ];
                        //print_r($_SESSION["login"]);
                        header("Location: index.php");
                        die();
                    } else {
                        $erro = "Username, senha ou tipo de conta inválido(s)";
                    }
                }
            } else {
                /**
                 * Se for "J" -> Pessoa Jurídica
                 * Cria uma query que busca a pessoa pelo username
                 * Confere para ver se username e senha (e hash da senha) batem
                 * Cria uma sessão contendo: username, nome, sobrenome (vazio neste caso), area e tipo de conta
                 */
                $query = "SELECT * FROM pessoa_juridica WHERE username_pj = '$formUsername';";

                /**
                 * Executa pra ver se existe alguém com esse username.
                 * Se não existe, retorna o erro
                 * Se existe, prossegue
                 */
                if (!$row = $mysqli->query($query)->fetch_assoc()) {
                    $erro = "Username, senha ou tipo de conta inválido(s)";
                } else {
                    /**
                     * Verifica se a senha informada bate com o hash da senha no banco
                     * Se sim, cria a sessão.
                     * Se não, retorna o erro
                     */
                    if ($formUsername == $row["username_pj"] && password_verify($formSenha, $row["senha_pj"])) {

                        $_SESSION["login"] = [
                            "username" => $row["username_pj"],
                            "nome" => $row["nome_pj"],
                            "sobrenome" => $row["sobrenome_pj"],
                            "area" => $row["area_pj"],
                            "tipo" => "J"
                        ];
                        //print_r($_SESSION["login"]);
                        header("Location: index.php");
                        die();
                    } else {
                        $erro = "Username, senha ou tipo de conta inválido(s)";
                    }
                }
            }
        }
    } else {
        header('Location: index.php');
        die();
    }
} else {
    die("Não foi possível conectar ao banco de dados: " . $mysqli->connect_error);
}

require_once "includes/header.php";
        //Mensagem de erro (somente se existir :D )
        if (isset($erro)) {
            echo "
                <div class='container'>
                    <section class='erro-login-cadastro'>
                        Erro: $erro
                    </section>
                </div>
            ";
        }
        require_once "includes/form_login.php";
$mysqli->close();
