<?php 
    include("../includes/protect.php");
    include('../includes/connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $birth = $_POST["birth"];
        $email = $_POST["email"];

        $sql = "INSERT INTO clientes (nome, data_nascimento, email) VALUES ('$name', '$birth', '$email')";
    
        if ($mysqli->query($sql) === TRUE) {
            echo '<span class="register-success"></span>';
        } else {
            echo '<span class="register-error"></span>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../web/css/painel.css">
    <link rel="icon" type="image/x-icon" href="../assets/base/logo.avif"/>
    <link href="https://api.fontshare.com/v2/css?f[]=pilcrow-rounded@1,700,400,500,900,600&display=swap" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../web/js/painel.js"></script>
    <title>Painel</title>
</head>
<body>
    <?php include("../templates/header.php") ?>
    <?php include('../includes/delete.php'); ?>

    <section class="content-panel flex justify-center center">
        <div class="container flex column">
            <h1>Painel de Cadastro de Pessoas</h1>

            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome Completo</th>
                        <th>Data de Nascimento</th>
                        <th>Endereço de Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include_once('../includes/costumers.php'); ?>
                </tbody>
            </table>

            <div class="informations flex column">
                <h2>Informações</h2>
                <div class="info-box flex center">
                    <div class="information">
                        <h3>Total de cadastros</h3>
                        <p><?= $qtd ?></p>
                    </div>
                    <div class="information message">
                        <h3>Última atualização</h3>
                        <span><?= $removeMessage ?></span>
                    </div>
                </div>
            </div>

            <div class="register-box flex column">
                <h3>Cadastro de cliente</h3>
                <form class="register-costumer" action="" method="post">
                    <section class="register-area">
                        <p class="register-item">
                            <label>Nome:</label>
                            <input type="text" name="name" placeholder="Piter Parker">
                        </p>
                        <p class="register-item">
                            <label>Data de nascimento:</label>
                            <input type="date" name="birth" placeholder="01/01/1999">
                        </p>
                        <p class="register-item">
                            <label>Email:</label>
                            <input type="text" name="email" placeholder="piter.parker@gmail.com">
                        </p>
                        <p class="register-item buttons">
                            <button class="btn-register" type="submit">Cadastrar</button>
                            <button class="btn-cancel" type="reset">Cancelar</button>
                        </p>
                    </section>
                </form>
            </div>
        </div>
    </section>
</body>
</html>