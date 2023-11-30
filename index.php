<?php
    include('./includes/connection.php');

    if(isset($_POST['email']) || isset($_POST['senha'])) {
        if(strlen($_POST['email']) == 0) {
            echo '<div class="error"></div>';
        } else if(strlen($_POST['senha']) == 0) {
            echo '<div class="error"></div>';
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
                echo '<div class="error"></div>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./web/js/login-area.js"></script>
    <link rel="stylesheet" href="./web/css/base.css"/>
    <link rel="stylesheet" href="./web/css/login-area.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Sistema de crediário</title>
</head>
<body class="flex center justify-center">
    <form class="login register flex center justify-center" action="" method="post">
        <section class="login-area flex center justify-center column">
            <h1>Acesse sua conta</h1>
            <p class="login-box email">
                <label>E-mail:</label>
                <input type="text" name="email">
            </p>
            <p class="login-box password">
                <label>Senha:</label>
                <input type="password" name="senha">
            </p>
            <p class="login-box button-login">
                <button type="submit">Entrar</button>
            </p>
            <span class="sign-up">Ainda não tem uma conta? Crie uma agora</span>
        </section>
    </form>
</body>
</html>