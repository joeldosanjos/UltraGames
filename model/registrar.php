<?php
include('conectar-bd.php');
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nascimento = $_POST['nascimento'];

// Definir SQL
try {
    $dados = $conecta->query("INSERT INTO clientes(nome,email,senha,nascimento) VALUES('$nome', '$email', '$senha', '$nascimento')");
    echo "<script>
            alert('Cadastrado com sucesso!');
            document.location.href=('../index.php');
          </script>";
} catch (PDOException $erro) {
    echo "alert('Houve um problema na conexão.');
          document.location.href=('../view/cadastro.php');";
}
