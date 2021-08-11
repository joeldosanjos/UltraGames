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
    <link rel="stylesheet" href="estilo.css">
    <script src="https://kit.fontawesome.com/30bd522453.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="background">
        <form method="post" action="../model/registrar.php" class="login">
            <a href="../index.php"><i class="fas fa-arrow-left fa-2x voltar"></i></a>
            <label for="nome">
                <input type="text" placeholder="Nome" name="nome" autofocus required>
            </label>
            <label for="email">
                <input type="email" placeholder="E-mail" name="email" required>
            </label>
            <label for="nascimento">
                <input type="date" placeholder="Data de Nascimento" name="nascimento" required>
            </label>
            <label for="senha">
                <input type="password" placeholder="Senha" name="senha" required>
            </label>
            <button>
                <span class="state">Cadastrar</span>
            </button>
        </form>
    </div>
</body>

</html>