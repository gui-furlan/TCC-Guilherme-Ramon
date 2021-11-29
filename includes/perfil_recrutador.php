
<!-- Perfil -->

<div class="container">
    <section class="formulario-perfil">
        <form method="POST">
            <label>Nome: </label>
            <input type='text' name='nome' value='<?= $row['nome_pj'] ?>'>
            <label>CNPJ: </label>
            <input type='text' name='cnpj' value='<?= $row['cnpj_pj'] ?>'>
            <label>Email: </label>
            <input type='email' name='email' value='<?= $row['email_pj'] ?>'>
            <label>Unidade Federativa: </label>
            <input type='text' name='estado' value='<?= $row['estado_pj'] ?>'>
            <label>Município: </label>
            <input type='text' name='municipio' value='<?= $row['municipio_pj'] ?>'>
            <label>Área: </label>
            <input type='text' name='area' value='<?= $row['area_pj'] ?>'>
            <label>Nome de usuário (inalterável): </label>
            <input type='text' name='username' value='<?= $row['username_pj'] ?>' disabled>
            <label>Sua biografia</label><br/>
            <textarea name='bio' rows=7 placeholder='Fale um pouco de sua empresa: história, objetivos, trabalhos...' ><?= $row['bio_pj'] ?></textarea><br/>
            <hr/>
            <div>
                <input class='submit' name='atualizar' type='submit' value='Salvar Alterações'>
            </div>
        </form>
    </section>
</div>