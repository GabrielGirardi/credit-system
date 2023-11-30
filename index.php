<?php
    include('./includes/connection.php');

    if(isset($_POST['email']) || isset($_POST['senha'])) {
        if(strlen($_POST['email']) == 0) {
            echo "Preencha seu e-mail";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha a sua senha";
        } else {
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1) {
                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['username'] = $usuario['username'];

                header("Location: ./pages/painel.php");

            } else {
                echo "Falha ao fazer login, verifique os dados forncecidos";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./web/css/base.css"/>
    <title>Sistema de crediário</title>
</head>
<body>
    <form action="" method="post">
        <h1>Acesse sua conta</h1>
        <p>
            <label>E-mail:</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha:</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>