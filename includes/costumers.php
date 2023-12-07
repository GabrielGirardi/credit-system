<?php
include('./connection.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$sql = "SELECT * FROM clientes";
$result = $mysqli->query($sql);

$qtd = $result->num_rows;

if ($qtd > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row["id"] . '</td>
                <td>' . $row["nome"] . '</td>
                <td>' . $row["data_nascimento"] . '</td>
                <td>' . $row["email"] . '</td>
            </tr>';
    }
} else {
    echo '<tr>
            <td colspan="4">Nenhum registro encontrado</td>
        </tr>';
}

$mysqli->close();