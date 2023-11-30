<?php 

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    die('Você não está logado, acesse por <a href="../index.php">aqui</a>');
}

?>