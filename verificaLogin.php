<?php

require('inc/banco.php');

session_start();

$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;

if (isset($login) && isset($senha)) {
    
    $query = $pdo->prepare('SELECT usuario, senha FROM usuarios WHERE usuario = :usuario');
    $query->bindValue(':usuario', $login);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
        
        $_SESSION['usuario'] = $user['usuario'];

        header('Location: index.php');
        
    } else {
        echo "Usuário ou senha incorretos.";
    }
}