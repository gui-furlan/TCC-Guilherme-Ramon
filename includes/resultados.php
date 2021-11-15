    <!-- Resultados -->
    <div class="container">
        <section class="resultados">
            <div class="titulo">
                <?php
                /**
                 * Verifica se a pesquisa está vazia
                 * Se sim, título indica que todas as oportunidades foram listadas
                 * Se não, verifica se o usuário clicou em "Minhas Oportunidades"
                 * * Se sim, título indica que está visualizando suas próprias oportunidades
                 * * Se não, título indica que está mostrando resultados para a busca
                 */ 
                $p = $_GET["p"];
                if ($p == "") {
                    echo "<h1>Todas as oportunidades</h1>";
                } else if ($p == "minhasoportunidades") {
                    echo "<h1>Suas oportunidades</h1>";
                } else {
                    echo "<h1>Resultados para: '" . $_GET["p"] . "'</h1>";
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
                if ((!isset($p)) || ($p == "")) {
                    $query = "SELECT codigo_opo, titulo_opo, area_opo, nome_pj, contrato_opo, local_opo 
                    FROM oportunidade JOIN pessoa_juridica ON pk_pessoa_juridica = fk_pessoa_juridica 
                    ORDER BY pk_oportunidade DESC;";
                } else {
                    /**
                     * Verifica se o usuário clicou em "mostrar minhas oportunidades
                     * Se sim, faz a pesquisa das suas oportunidades
                     * Se não, faz a pesquisa com o que foi escrito na barra de busca
                     */
                    if ($p == "minhasoportunidades") {
                        $username = $_SESSION["login"]["username"];
                        $query = "SELECT codigo_opo, titulo_opo, area_opo, nome_pj, contrato_opo, local_opo 
                        FROM oportunidade JOIN pessoa_juridica ON pk_pessoa_juridica = fk_pessoa_juridica
                        WHERE username_pj = '$username' 
                        ORDER BY pk_oportunidade DESC;";
                    } else {
                        $query = "SELECT codigo_opo, titulo_opo, area_opo, nome_pj, contrato_opo, local_opo 
                        FROM oportunidade JOIN pessoa_juridica ON pk_pessoa_juridica = fk_pessoa_juridica 
                        WHERE titulo_opo LIKE '%$p%' 
                        OR area_opo LIKE '%$p%' 
                        OR contrato_opo LIKE '%$p%' 
                        OR local_opo LIKE '%$p%' 
                        OR nome_pj LIKE '%$p%' 
                        ORDER BY pk_oportunidade DESC;";
                    }
                }
                /**
                 * Verifica se existem registros no banco
                 * Se não, dá erro ;)
                 * Se sim, prossegue p/ listagem
                 * - Cada $row recebe um fetch_assoc de $result
                 * - $i incrementa a cada iteração
                 */
                $result = $mysqli->query($query);
                if ($result->num_rows == 0) {
                    echo "
                            <div class='info'>
                                <p>Não existem registros no momento. Tente novamente mais tarde =D</p>
                            </div>
                        ";
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
                                        <a class='titulo-vaga' href='oportunidade.php?c= " . $row["codigo_opo"] . "'>" . $row["titulo_opo"] . "</a><br/>
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
                ?>
            </div>
        </section>
    </div>
    <!-- Fim Resultados -->