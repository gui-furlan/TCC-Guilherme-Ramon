 
 <!-- Início form-cadastroprofissional.php -->
 <div class="container">
     <section class="formulario">
         <h1>Criar conta de Profissional</h1>
         <hr />
         <form method="POST">
             <div>
                 <label>Primeiro nome:</label>
                 <input type="text" name="nome" placeholder="Requerido">
                 <div class="clear"></div>
             </div>
             <div>
                 <label>Sobrenome:</label>
                 <input type="text" name="sobrenome" placeholder="Requerido">
                 <div class="clear"></div>
             </div>
             <div>
                 <label>CPF:</label>
                 <input type="text" name="cpf" placeholder="Requerido">
                 <div class="clear"></div>
             </div>
             <div>
                 <label>E-mail:</label>
                 <input type="email" name="email" placeholder="Requerido">
                 <div class="clear"></div>
             </div>
             <div>
                 <!-- Área de atuação de destaque -->
                 <?php
                    include("select-area-atuacao.php");
                 ?>
                 <div class="clear"></div>
             </div>
             <hr/>
             <div>
                 <!-- Data de nascimento -->
                 <label>Data de nascimento:</label>
                 <input type="date" name="nascimento">
                 <div class="clear"></div>
             </div>
             <div>
                 <!-- Sexo -->
                 <label>Sexo:</label><br/>
                 <select name="sexo" style="width: 100px; border: 1px solid black">
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                 </select>
             </div>
             <hr/>
             <div>
                 <label>Unidade Federativa:</label>
                 <input type="text" name="estado" placeholder="Requerido">
                 <div class="clear"></div>
             </div>
             <div>
                 <label>Município:</label>
                 <input type="text" name="municipio" placeholder="Requerido">
                 <div class="clear"></div>
             </div>
             <div>
                 <label>CEP:</label>
                 <input type="text" name="cep" placeholder="Requerido">
                 <div class="clear"></div>
             </div>
             <hr/>
             <div>
                 <label>Senha:</label>
                 <input type="password" name="senha" placeholder="Você usará esta senha para logar...">
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
 <script>document.getElementsByTagName("body")[0].style.backgroundColor = "#EBEBEB"</script>

 <!-- Fim form-cadastroprofissional.php -->
 