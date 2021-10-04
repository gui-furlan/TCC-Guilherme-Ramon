<?php

/**
 * Conexão ao banco de dados.
 */

$servername = "localhost";
$username = "guilherme";
$password = "abc123";
$dbname = "tcc1";

$mysqli = new mysqli($servername, $username, $password, $dbname);

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

    if (!isset($_SESSION['login'])) {
        require_once "classes/Pessoa.php";
        require_once "classes/PessoaJuridica.php";

        /**
         * Verifica se o formulário está preenchido.
         * Se estiver, prossegue para o cadastro no banco.
         * Se não, carrega o formulário para preenchimento.
         */
         
        if (
            isset($_POST['nome']) && isset($_POST['cnpj']) && isset($_POST['email']) 
             && isset($_POST['estado']) && isset($_POST['municipio']) && isset($_POST['cep']) && isset($_POST['senha'])
        ) {

            /**
             * Instancia o objeto PessoaFisica
             * com as informações do formulário
             */
            $nome = $_POST['nome'];
            $cnpj = $_POST['cnpj'];
            $email = $_POST['email'];
            $area = $_POST['area'];
            $estado = $_POST['estado'];
            $cidade = $_POST['municipio'];
            $cep = $_POST['cep'];
            $senha = $_POST['senha'];

            $pessoa = new PessoaJuridica(
                $nome,
                $cnpj,
                $email,
                $area,
                $estado,
                $cidade,
                $cep,
                $senha
            );

            /**
             * Preparativos para o banco:
             * Tipo atribuído como F (apenas banco).
             **/
            $tipo = "J";

            /**
             * Cadastrar no banco:
             * 1 - Criar query com parâmetros indefinidos;
             * 2 - Prepare and bind
             * 3 - Executa
             * Se executar, inicia uma sessão
             * Se der erro, lança erro =)
             */
            $query = "INSERT INTO pessoa (nome_pes, cnpj_pes,
                area_pes, email_pes, senha_pes, tipo_pes)
                VALUES (?, ?, ?, ?, ?, ?)";

            if ($stmt = $mysqli->prepare($query)) {
                $stmt->bind_param(
                    "ssssss",
                    $nome,
                    $cnpj,
                    $area,
                    $email,
                    $senha,
                    $tipo
                );

                if ($stmt->execute()) {
                    $_SESSION['login'] = $nome;
                    header("Location: index.php");
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