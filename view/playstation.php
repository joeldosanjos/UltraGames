<?php
session_start();
if (!isset($_SESSION['valida'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ultra Games</title>
    <meta charset="utf-8">
    <meta name="author" content="Joel dos Anjos, Marco Antônio">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilo.css">
    <script src="https://kit.fontawesome.com/30bd522453.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function abrirMenu() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
</head>

<body>
    <header>
        <div class="title">
            <h1>Ultra Games</h1>
        </div>
        <nav class="topnav" id="myTopnav">
            <a href="todos.php">Todos</a>
            <a href="playstation.php" class="active">PlayStation 4</a>
            <a href="switch.php">Nintendo Switch</a>
            <a href="xbox.php">Xbox One</a>
            <a href="../model/sair.php" class="exit"><i class="fas fa-sign-out-alt"></i> Sair</a>
            <a href="carrinho.php" class=" buy" id="submit" onclick=""><i class="fas fa-shopping-cart"></i></a>
            <a href="javascript:void(0);" class="icon" onclick="abrirMenu()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
    </header>

    <section>
        <div class="container">
            <div class="row">

                <?php
                include('../model/conectar-bd.php');
                $dados = $conecta->query("SELECT * FROM `jogos` WHERE `plataforma` = 'PlayStation 4'");

                foreach ($dados as $linha) {
                    $idJogo = $linha['idJogo'];
                    $jogo = $linha['jogo'];
                    $preco = $linha['preco'];
                    $imagem = base64_encode($linha['imagem']);
                    echo
                        "<div class='col-md-4'>
                        <div class='produto'>
                        <div class='pi-img-wrapper'>
                            <img src='data:image/jpeg;base64,$imagem' class='img-responsive' alt='Capa do jogo' style='width: 100%;'>
                        </div><br>
                        <h3>$jogo</h3>
                        <div class='preco'>
                            R$ $preco,00
                        </div>
                        <form method='POST' action='../model/adicionar.php'>
                            <input type='hidden' value='$idJogo' name='idJogo'>
                            <input type='submit' value='Comprar' class='btn adicionar'>
                        </form>
                    </div>
                </div>";
                }

                ?>

            </div>
        </div>
    </section>

    <footer>
        <a href="javascript:void(0)" onclick="alert('Site desenvolvido por Joel dos Anjos e Marco Antônio | Programação para Web 2020/2')">Sobre</a>
    </footer>
</body>

</html>