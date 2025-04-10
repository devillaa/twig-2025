<?php

require('inc/banco.php');

$query = $pdo->prepare('SELECT usuario FROM usuarios');
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

$usuario = $_POST['usuario'] ?? null;

foreach($usuarios as $user){
    if($user['usuario'] == $usuario){
        header('location:registrar.php');
        exit;
    }
}

if(isset($_POST['senha'])){
    $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT );    
}

if(isset($usuario) && isset($senha)){
    $query = $pdo->prepare('INSERT INTO usuarios (usuario,senha) VALUES (:usuario,:senha)');

    $query->bindValue(':usuario', $usuario);
    $query->bindValue(':senha', $senha);

    $query->execute();

    header('location:login.php');
} else {
    header('location:registrar.php');
}