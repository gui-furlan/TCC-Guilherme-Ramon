    
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
            <hr/>
            <div class="oportunidades">
                <?php
                    /**
                     * Verifica se uma nenhuma busca foi feita
                     * Se não, mostra todas as oportunidades
                     * Se sim, faz a busca no banco
                     */
                ?>
            </div>
        </section>
    </div>
    <!-- Fim Resultados -->
