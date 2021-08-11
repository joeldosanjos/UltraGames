<?php
include('conectar-bd.php');
session_start();

$jogos = $_POST['jogos'];
$precoTotal = $_POST['precoTotal'];
$idCliente = $_SESSION['idCliente'];

try {
    $dados = $conecta->query("INSERT INTO compras(idCliente,jogo,valor) VALUES('$idCliente', '$jogos', '$precoTotal')");
    $dados = $conecta->query("DELETE FROM carrinho WHERE idCliente = '$idCliente'");
    echo "<script>
            alert('Compra realizada com sucesso!');
            document.location.href=('../view/todos.php');
          </script>";
} catch (PDOException $erro) {
    echo "alert('Houve um problema na conexão.');
          document.location.href=('../view/carrinho.php');";
}
