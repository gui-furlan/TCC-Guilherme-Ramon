<?php

/**
 * Conexão ao banco de dados
 */

$servername = "localhost";
$username = "guilherme";
$password = "abc123";
$dbname = "tcc1";

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
     * Se existir, faz logout (opcional) e vai para index.php
     */
    if (!isset($_SESSION['login'])) {
        require_once "header.php";
        require_once "form_login.php";
        //require_once "footer.php";

        /**
         * Verifica o preenchimento do formulário
         * Se estiver preenchido, pega as informações do POST
         */
        if (isset($_POST['email']) && isset($_POST['senha'])) {
            $formEmail = $_POST['email'];
            $formSenha = $_POST['senha'];

            /**
             * Consultar no banco de dados
             * 
             * Constrói a query.
             * Executa, atribui resultado à $result e verifica erros.
             */
            $query = "SELECT nome_pes FROM pessoa WHERE email_pes = '".$formEmail."' AND senha_pes = '".$formSenha."';";

            // Verifica erro no momento da execução
            if ($result = $mysqli->query($query)) { 

                /**
                 * Verifica se obteve resultado único
                 * Se sim, faz o login e redireciona para o index.php
                 * Se não, lança erro
                 */
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $_SESSION['login'] = $row['nome_pes'];
                    header("Location: index.php");
                } else {
                    die("Email e/ou senha inválido(s).");
                }
            } else {
                die ("Erro na execução da query: " . $mysqli->error);
            }
        }
    } else {
        if (isset($_GET['logout'])) {
            unset($_SESSION['login']);
            session_destroy();
        }
        header('Location: index.php');
    }
} else {
    die("Não foi possível conectar ao banco de dados: " . $mysqli->connect_error);
}

$mysqli->close();