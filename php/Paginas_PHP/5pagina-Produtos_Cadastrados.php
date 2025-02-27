<?php
// Conectar ao banco de dados
include "../conexaoDB.php";

// Consultar produtos no banco de dados
$consultaDosProdutos = "SELECT * FROM produtos";
$resultadoConsulta = $mysqli->query($consultaDosProdutos);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos_Prime Delivery</title>
    <link rel="stylesheet" href="../../css/style-produtos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<!------------- INICIO DA BARRA DE NAVEGAÇÃO SUPERIOR ------------->
<header class="topo-site">
    <!-- INICIO DA LOGO MARCA -->
    <img src="../../img/logo-amarelo_roxo-removebg.png" alt="logo" width="80">
    <!-- FIM DA LOGO MARCA -->

    <!-- INICIO MENU -->
    <nav class="menu-site">
        <a href="../../html/4pagina-Cadastro_Produtos.html"> Registrar Produtos</a>
        <a href="5pagina-Tabela_Produtos.php"> Editar Produtos</a>
        <a href="5pagina-Tabela_Clientes.php">Tabela de Clientes</a>
        <a href="../../html/index.html"><i class='bx bx-left-arrow-circle'></i>Voltar</a><br><br>
    </nav>
    <!-- FIM MENU -->
</header>
<!---------- FIM DA BARRA DE NAVEGAÇÃO SUPERIOR ----------->
<h1>Produtos Cadastrados</h1>

<body>

    <section class="produtos">
        <div class="container-produtos">
            <?php
            // codigo pra exibir os produtos
            while ($linhaProduto = $resultadoConsulta->fetch_assoc()) {
                echo '<div class="produto">';
                echo '<img src="' . $linhaProduto['Imagem_Path'] . '" alt="Imagem do Produto">';
                echo '<h3>' . $linhaProduto['Nome_Produto'] . '</h3>';
                echo '<p class="preco">Preço: R$ ' . $linhaProduto['Preco_Produto'] . '</p>';
                echo '<p class="descricao">' . $linhaProduto['Descricao_Produto'] . '</p>';
                echo '</div>';
            }
            ?>

        </div>
    </section>

</body>

</html>