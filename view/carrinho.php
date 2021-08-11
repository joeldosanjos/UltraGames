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
            <a href="playstation.php">PlayStation 4</a>
            <a href="switch.php">Nintendo Switch</a>
            <a href="xbox.php">Xbox One</a>
            <a href="../model/sair.php" class="exit"><i class="fas fa-sign-out-alt"></i> Sair</a>
            <a href="carrinho.php" class=" buy active" id="submit" onclick=""><i class="fas fa-shopping-cart"></i></a>
            <a href="javascript:void(0);" class="icon" onclick="abrirMenu()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
    </header>

    <section style="height: 100%;">
        <br><br>
        <div class="container">
            <h2>Carrinho de Compras</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Jogo</th>
                        <th>Plataforma</th>
                        <th>Preço Unitário</th>
                    </tr>
                </thead>
                <?php
                include('../model/conectar-bd.php');
                $idCliente = $_SESSION['idCliente'];
                $precoTotal = 0;
                $jogos = '';

                $dados = $conecta->query("SELECT * FROM carrinho WHERE idCliente = '$idCliente'");

                foreach ($dados as $linha) {
                    $idJogo = $linha['idJogo'];
                    $dados2 = $conecta->query("SELECT * FROM jogos WHERE idJogo = '$idJogo'");

                    foreach ($dados2 as $linha2) {
                        $jogo = $linha2['jogo'];
                        $plataforma = $linha2['plataforma'];
                        $preco = $linha2['preco'];
                        echo "
                            <tbody>
                            <tr>
                                <td>
                                    <form method='POST' action='../model/remover.php'>
                                        <input type='hidden' value='$idJogo' name='idJogo'>
                                        <button type='submit' class='btn btn-light btn-sm'>
                                            <i class='fa fa-trash' aria-hidden='true'></i>
                                        </button>
                                    </form>
                                </td>
                                <td>$jogo</td>
                                <td>$plataforma</td>
                                <td>R$ $preco,00</td>
                            </tr>
                        </tbody>";

                        $precoTotal += $preco;
                        $jogos .= $jogo . ", ";
                    }
                }
                ?>
        </div>
        </table>
        <div class="precoTotal">
            <table class="table" style="width: auto;">
                <thead>
                    <tr>
                        <th>Preço Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo "R$ $precoTotal,00"; ?></td>
                    </tr>
                </tbody>
            </table>

            <?php
            if ($precoTotal != 0)
                echo "
                <form method='POST' action='../model/comprar.php'>
                    <input type='hidden' value='$precoTotal' name='precoTotal'>
                    <input type='hidden' value='$jogos' name='jogos'>
                    <button type='submit' class='btn btn-light'>
                        Confirmar compra
                    </button>
                </form>";
            ?>
        </div>
    </section>

    <footer>
        <a href="javascript:void(0)" onclick="alert('Site desenvolvido por Joel dos Anjos e Marco Antônio | Programação para Web 2020/2')">Sobre</a>
    </footer>
</body>

</html>