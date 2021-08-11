<?php
include('conectar-bd.php');
session_start();

$idJogo = $_POST['idJogo'];
$idCliente = $_SESSION['idCliente'];

try {
    $dados = $conecta->query("DELETE FROM carrinho WHERE idJogo = '$idJogo' AND idCliente = '$idCliente'");
    header('Location: ../view/carrinho.php');
} catch (PDOException $erro) {
    echo "<script>
            alert('Houve um problema na conexão');
            document.location.href=('../view/todos.php');
          </script>";
}
