<?php
include('conectar-bd.php');
session_start();

$idJogo = $_POST['idJogo'];
$idCliente = $_SESSION['idCliente'];

try {
    $dados = $conecta->query("INSERT INTO carrinho(idCliente, idJogo) VALUES('$idCliente', '$idJogo')");
    header('Location: ../view/carrinho.php');
} catch (PDOException $erro) {
    echo "<script>
            alert('Houve um problema na conexão');
            document.location.href=('../view/todos.php');
          </script>";
}
