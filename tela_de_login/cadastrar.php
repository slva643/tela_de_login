<!DOCTYPE html>
<?php
require_once "./class/usuarios.php";
$u = new Usuario;
?>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <title>Tela de Login</title>
</head>

<body>
   <div class="volt">
      <a href="index.php">voltar</a>
   </div>
   <div id="corpo-form-cad">
      <h1>Cadastrar</h1>
      <form method="POST">
         <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
         <input type="text" name="telefone" placeholder="Telefonr" maxlength="30">
         <input type="email" name="email" placeholder="Usuário" maxlength="40">
         <input type="password" name="senha" placeholder="Senha" maxlength="15">
         <input type="password" name="ConfSenha" placeholder="Confimar Senha" maxlength="15">
         <input type="submit" value="Cadastra-se">
      </form>
   </div>
   <?php
   // verificar se clicou no botão
   if (isset($_POST['nome'])) {
      $nome = addslashes($_POST['nome']);
      $telefone = addslashes($_POST['telefone']);
      $email = addslashes($_POST['email']);
      $senha = addslashes($_POST['senha']);
      $ConfimarSenha = addslashes($_POST['ConfSenha']);
      
      //Verificar se está preenchido
      if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($ConfimarSenha)) {
         $u->conectar("projeto_login", "localhost", "root", "");
         if ($u->msgErro == "") // Está tudo certo.
         {
            if ($senha == $ConfimarSenha) {
               if ($u->cadastrar($nome, $telefone, $email, $senha)) {
                  ?>
                  <div id="msg-sucesso">
                     Cadastrado com sucesso! Acesse para entrar!
                  </div>
               <?php
            } else {
               ?>
                  <div class="msg-erro">
                     Email já cadastrado!
                  </div>
               <?php
               }
            } else {
               ?>
               <div class="msg-erro">
                  Senha e confimar Senha não correspondem!
               </div>

               <?php
            }
         } else {
            ?>
               <div class="msg-erro">
                  <?php echo "Erro " . $u->msgErro; ?>
               </div>

            <?php
         }
      } else { ?>

         <div class="msg-erro">
            Preencha todos os campos!
         </div>

         <?php
      }
   }
   ?>
</body>

</html>