<?php
session_start();
if (isset($_SESSION['valida'])) {
    header('Location: todos.php');
} else {
    session_destroy();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ultra Games</title>
    <meta charset="utf-8">
    <meta name="author" content="Joel dos Anjos, Marco Antônio">
    <link rel="stylesheet" href="view/estilo.css">
</head>

<body>
    <div class="background">
        <form method="post" action="model/login.php" class="login">
            <p class="title">Ultra Games</p>
            <label for="email">
                <input type="email" placeholder="E-mail" name="email" autofocus required>
            </label>
            <label for="senha">
                <input type="password" placeholder="Senha" name="senha" required>
            </label>
            <a class="cadastro" href="view/cadastro.php">Cadastre-se aqui</a>
            <button>
                <span class="state">Logar</span>
            </button>
        </form>
    </div>
</body>

</html>