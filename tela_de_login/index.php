<!DOCTYPE html>

<?php
require_once "./class/usuarios.php";
$u = new Usuario; // Istância
?>

<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="css/style.css">
   <title>Tela de Login</title>
</head>

<body>

   <div id="corpo-form">
      <h1>Entrar</h1>
      <form method="POST">
         <input type="email" name="email" placeholder="Usuário">
         <input type="passoword" name="senha" placeholder="Senha">
         <input type="submit" value="Acesso">
         <a href="cadastrar.php">Ainda não é incrito?<strong>Cadastre-se</strong></a>
      </form>
   </div>
   <?php
   if (isset($_POST['email'])) {

      $email = addslashes($_POST['email']);
      $senha = addslashes($_POST['senha']);


      if (!empty($email) && !empty($senha)) {

         $u->conectar("projeto_login", "localhost", "root", "");
         if ($u->msgErro == "") {
            if ($u->logar($email, $senha)) {
               header("location: AreaPrivada.php");
            } else {
   ?>
               <div class="msg-erro">
                  Email e/ou senha estão incorretos!
               </div>
               <?php
            }
         } else {
            ?>
               <div class="" mgs-erro>
                  <?php echo "Erro: " . $u->msgErro; ?>
               </div>
         <?php
         }
      } else {
         ?>
            <div class="msg-erro">
               Preencha todos os campos!
            </div>
      <?php
      }
   }
   ?>
</body>

</html>