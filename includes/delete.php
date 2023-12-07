<?php

include("./connection.php");

$removeMessage = "";  

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idCliente = $_GET['id'];

    $checkIfExists = $mysqli->prepare("SELECT id FROM clientes WHERE id = ?");
    $checkIfExists->bind_param("i", $idCliente);
    $checkIfExists->execute();
    $checkIfExists->store_result();

    if ($checkIfExists->num_rows > 0) {
        $remsql = $mysqli->prepare("DELETE FROM clientes WHERE id = ?");
        $remsql->bind_param("i", $idCliente);

        if ($remsql->execute()) {
            $removeMessage = "Cliente removido com sucesso!";
        } else {
            $removeMessage = "Erro ao remover o cliente: " . $remsql->error;
        }

        $remsql->close();
    } else {
        $removeMessage = "Cliente com o ID fornecido não existe.";
    }

    $checkIfExists->close();
} else {
    $removeMessage = "Insira um ID (Remover)";
}
?>


<div id="popup" class="popup-container">
    <div class="popup">
        <form action="" method="get">
            <label for="cliente_id">ID do Cliente:</label>
            <input type="number" id="cliente_id" name="id" pattern="\d*" inputmode="numeric" required>
            <button class="btn-remove-popup" type="submit">Remover</button>
        </form>

        <button class="btn-close-popup">Fechar</button>
        <span class="text"><?= $removeMessage ?></span>
    </div>
</div>


<style>
    .popup-container {
        display: none;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .popup {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        width: 300px;
        height: 140px;
        padding: 20px;
        border-radius: 13px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    #cliente_id {
        width: 60px;
        height: 30px;
        border: 1px solid #ccc;
        padding: 6px;
        margin-right: 8px;
    }

    #cliente_id:focus {
        outline: none;
        border-color: #d9d9d9; 
    }

    #popup button {
        width: 80px;
        height: 30px;
        padding: 6px;
        background: var(--error);
        border: none;
        border-radius: 5px;
        color: var(--color-white);
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        cursor: pointer;
    }

    #popup button.btn-close-popup {
        background: var(--success);
        margin-top: 10px;
    }

    #popup .text {
        font-size: 12px;
        font-weight: 700;
        color: var(--color-black);
        margin-top: 10px;
    }
</style>
