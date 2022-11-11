<?php
class Usuario
{
   private $pdo; // <-PDO Como é uma variável estanciada
   public $msgErro = "";

   public function conectar($nome, $host, $usuario, $senha) // Esse método que vai conectar com banco de dado
   {
      global $pdo; // A variável é colocado no mopdo global para não ser confuntida com outra variável.
      global $msgErro;

      try { // Para invitar algum tipo de erro.
         $pdo = new  PDO("mysql:dbname=" . $nome . ";host=" . $host, $usuario, $senha);
      } catch (PDOException $e) {
         $msgErro = $e->getMessage();
      }
   }




   //Uma função para cadastro que vai enviar por banco de dado
   public function cadastrar($nome, $telefone, $email, $senha)
   {
      global $pdo;
      // verificar se já existem o email cadastrado
      $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e");
      $sql->bindValue(":e", $email);
      $sql->execute();
      if ($sql->rowCount() > 0) {
         return false; // Já está cadastrada
      } else {
         // caso não, cadastrar
         $sql = $pdo->prepare("INSERT INTO usuario (nome, telefone, email, senha) VALUE (:n, :t, :e, :s)");
         $sql->bindValue(":n", $nome);
         $sql->bindValue(":t", $telefone);
         $sql->bindValue(":e", $email);
         $sql->bindValue(":s", md5($senha));
         $sql->execute();
         return true;
      }
   }



   //Função da tela de login para verificar se está cadastrada ou não
   public function logar($email, $senha)
   {
      global $pdo;
         //verificar se email e senha estão cadastrados, se sim
         $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e AND senha = :s");
         $sql->bindValue(":e", $email);
         $sql->bindValue(":s", md5($senha));
         $sql->execute();
      if ($sql->rowCount() > 0) {
         // emtrar no sistema (sessão)
         $dado = $sql->fetch(); //Transforma em uma rei
         session_start();
         $_SESSION['id_usuario'] = $dado['id_usuario'];
         return true; //Cadastrada com sucesso
      } else {
         return false; // Não foi possivel logar
      }
   }
}
