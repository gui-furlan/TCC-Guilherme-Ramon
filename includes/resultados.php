    <!-- Resultados -->
    <div class="container">
        <section class="resultados">
            <div class="titulo">
                <?php
                if ($_GET["p"] != "") {
                    echo "<h1>Resultados para: " . $_GET["p"];
                } else {
                    echo "<h1>Todas as oportunidades</h1>";
                }
                ?>
            </div>
            <hr />
            <div class="oportunidades">
                <?php
                /**
                 * Conexão ao banco de dados
                 */
                require_once "conexao.php";

                /**
                 * Se nenhuma pesquisa for feita, mostra todas as oportunidades
                 * Se uma pesquisa for feita, faz a busca no banco
                 */
                if ((!isset($_GET["p"])) || ($_GET["p"] == "")) {
                    $query = "SELECT codigo_opo, titulo_opo, area_opo, nome_pj, contrato_opo, local_opo FROM oportunidade JOIN pessoa_juridica ON pk_pessoa_juridica = fk_pessoa_juridica ORDER BY pk_oportunidade DESC;";

                    /**
                     * Verifica se existem registros no banco
                     * Se não, dá erro
                     * Se sim, prossegue p/ listagem
                     * - Cada $row recebe um fetch de $result
                     * - $i incrementa a cada iteração
                     */
                    if (!$result = $mysqli->query($query)) {
                        echo "<pre style='text-align:center'>Não existem oportunidades cadastradas ainda :D</pre>";
                    } else {
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                            if ($i % 2 != 0) {
                                $style = "style='background-color: var(--corClara)'";
                            } else {
                                $style = "";
                            }
                            echo "
                                <div class='oportunidade' $style>
                                    <div class='imagem'>
                                        <img src='img/default_user.jpg'>
                                    </div>
                                    <div class='info'>
                                        <p class='titulo-vaga'>" . $row["titulo_opo"] . "</p>
                                        <a class='empresa' href=''>" . $row["nome_pj"] . "</a>
                                        <p class='contrato-local'>" . $row["contrato_opo"] . " - " . $row["local_opo"] . "</p>
                                    </div>
                                </div>
                                <div class='clear'></div>
                                <hr/>
                                ";
                            $i++;
                        }
                    }
                }
                ?>
            </div>
        </section>
    </div>
    <!-- Fim Resultados -->