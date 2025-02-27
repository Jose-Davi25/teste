<?php
include('../conexaoDB.php');

// VERIFICA SE OS DADOS FORAM ENVIADOS VIA POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // OBTEM OS DADOS DO FORMULARIO
    $Nome_Cliente = $_POST['Nome_Cliente'];
    $Senha_Cliente = $_POST['Senha_Cliente'];
    $Endereco_Cliente = $_POST['Endereco_Cliente'];
    $Celular = $_POST['Celular'];

    // ESCAPA OS VALORES PARA EVITAR SQL INJECTION
    $Nome_Cliente = mysqli_real_escape_string($mysqli, $Nome_Cliente);
    $Senha_Cliente = mysqli_real_escape_string($mysqli, $Senha_Cliente);
    $Endereco_Cliente = mysqli_real_escape_string($mysqli, $Endereco_Cliente);
    $Celular = mysqli_real_escape_string($mysqli, $Celular);

    // VERIFICA SE O USUARIO JÁ EXISTE
    $sql_code = "SELECT * FROM Cliente WHERE Nome_Cliente = '$Nome_Cliente' OR Senha_Cliente = '$Senha_Cliente'";
    $retorno = mysqli_query($mysqli, $sql_code);

    if (mysqli_num_rows($retorno) > 0) {
        echo 'Esse usuário já existe, clique aqui pra fazer o  <a href="../../html/2pagina-Login.html"> Login</a>';
        ;
    } else {

        // INNSERE O NOVO USUARIO NO BANCO DE DADOS
        $sql_code = "INSERT INTO cliente (ID_Cliente, Nome_Cliente, Senha_Cliente, Endereco_Cliente, Celular) 
            VALUES (NULL, '$Nome_Cliente', '$Senha_Cliente', '$Endereco_Cliente', '$Celular')";
        $resultado = mysqli_query($mysqli, $sql_code);

        if ($resultado) {
            echo "Usuario cadastrado";
            header("Location: 2pagina-Login.html");
            exit();
        } else {
            echo "Erro ao cadastrar usuario: " . mysql_error($mysqli);
        }
    }
}
?>