<?php

require('inc/banco.php');

session_start();

$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;

if (isset($login) && isset($senha)) {
    
    $query = $pdo->prepare('SELECT usuario, senha, id FROM usuarios WHERE usuario = :usuario');
    $query->bindValue(':usuario', $login);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
        
        $_SESSION['id'] = $user['id'];
        $_SESSION['usuario'] = $user['usuario']; 
        $_SESSION['senha'] = $user['senha'];

        header('Location: index.php');
        
    } else {
        $erro = 'Usuário ou senha incorreto!';
        header("Location: login.php?erro=$erro");
        exit;
    }
}