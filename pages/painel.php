<?php 
include("../includes/protect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../web/css/painel.css">
    <title>Painel</title>
</head>
<body>
    <?php include("../templates/header.php") ?>

    <div class="container flex center justify-center">
        <section>
            <h1>Painel de Cadastro de Pessoas</h1>
        </section>

        <section>
            <input type="text" id="filtroNome" placeholder="Filtrar por nome">

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
                    <tr>
                        <td>1</td>
                        <td>João Silva</td>
                        <td>1990-01-01</td>
                        <td>joao.silva@email.com</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>