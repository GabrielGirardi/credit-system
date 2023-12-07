<?php
    include("./connection.php");

    $result = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_nome = $_POST["nome"];
        
        $query = "SELECT * FROM clientes WHERE nome LIKE ?";
        $stmt = $mysqli->prepare($query);
        $search_nome = "%$search_nome%";
        $stmt->bind_param("s", $search_nome);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        #popup-search {
            display: block;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container-search {
            padding: 20px;
        }

        h3 {
            margin-top: 0;
            color: #333;
        }

        #search-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input {
            padding: 1%;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 98%;
        }

        button {
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .results {
            margin: 15px 0;
            overflow: scroll;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Estilos Responsivos */
        @media screen and (max-width: 600px) {
            #popup-search {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div id="popup-search">
        <div class="container-search">
            <h3>Pesquisa por Nome</h3>

            <form id="search-form" method="post">
                <label for="cliente_nome">Nome do Cliente:</label>
                <input type="text" id="cliente_nome" name="nome" required>
                <button type="submit">Pesquisar</button>
            </form>

            <div class="results">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && $result !== null) {
                    echo '<table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Data de Nascimento</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td>' . $row["id"] . '</td>
                                <td>' . $row["nome"] . '</td>
                                <td>' . $row["data_nascimento"] . '</td>
                                <td>' . $row["email"] . '</td>
                            </tr>';
                    }

                    echo '</tbody>
                        </table>';
                }
                ?>
            </div>

            <a href="../pages/painel.php"><button>Voltar ao Painel</button></a>
        </div>
    </div>
</body>
</html>
