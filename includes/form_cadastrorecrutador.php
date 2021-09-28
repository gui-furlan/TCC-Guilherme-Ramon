 
 <!-- Início includes/form-cadastrorecrutador.php -->
 <div class="container">
     <section class="formulario">
         <h1>Criar conta de Recrutador</h1>
         <hr />
         <form method="POST">
             <div>
                 <label>Nome da empresa:</label>
                 <input type="text" name="nome">
                 <div class="clear"></div>
             </div>
             <div>
                 <label>CNPJ:</label>
                 <input type="text" name="cpf">
                 <div class="clear"></div>
             </div>
             <div>
                 <label>E-mail:</label>
                 <input type="email" name="email">
                 <div class="clear"></div>
             </div>
             <hr/>
             <div>
                 <label>Unidade Federativa:</label>
                 <input type="text" name="estado">
                 <div class="clear"></div>
             </div>
             <div>
                 <label>Município:</label>
                 <input type="text" name="municipio">
                 <div class="clear"></div>
             </div>
             <div>
                 <label>CEP:</label>
                 <input type="text" name="cep">
                 <div class="clear"></div>
             </div>
             <hr/>
             <div>
                 <!-- Área de atuação de destaque -->
                 <?php
                    include("select-area-atuacao.php");
                 ?>
                 <div class="clear"></div>
             </div>
             <hr/>
             <div>
                 <label>Senha:</label>
                 <input type="password" name="senha">
                 <div class="clear"></div>
             </div>
             <hr/>
             <div class="div_submit">
                 <input class="submit" type="submit" value="Cadastrar">
                 <div class="clear"></div>
             </div>
         </form>
     </section>
 </div>
 <!-- Fim includes/form-cadastrorecrutador.php -->
 