<?PHP
session_start();
if (!isset($_SESSION['id_usuario'])) {
   header("location: index.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <title>Are de Trabalho</title>
</head>
<body>
   <h1>Seja Bem-Vindo!
   Trabalho de Login<h1>
</body>
</html>

