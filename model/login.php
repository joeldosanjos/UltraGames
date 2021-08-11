<?php
include('conectar-bd.php');
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

try {
    $consulta = $conecta->query("SELECT * FROM clientes WHERE email='$email' AND senha='$senha'");
    $linha = $consulta->fetch(PDO::FETCH_ASSOC);  // retorna quantidade de linha da consulta

    if ($linha > 0) {
        $_SESSION['usuario'] = $email;
        $_SESSION['valida'] = 1;
        $_SESSION['idCliente'] = $linha['idCliente'];

        header("Location: ../view/todos.php");
    } else {
        echo "<script>
              alert('Dados não conferem, tente novamente...');
              document.location.href=('../index.php');
             </script>";
    }
} catch (PDOException $erro) {
    echo "Problemas de conexão...";
}
