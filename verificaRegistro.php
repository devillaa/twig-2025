<?php

require('inc/banco.php');

$query = $pdo->prepare('SELECT usuario FROM usuarios');
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

$usuario = $_POST['usuario'] ?? null;

foreach($usuarios as $user){
    if($user['usuario'] == $usuario){
        $erro = 'Usuário já cadastrado!';
        header("location:registrar.php?erro=$erro");
        exit;
    }
}

$senha = $_POST['senha'] ?? null;

if($usuario!= '' && $senha!=''){
    $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT );  
    
    $query = $pdo->prepare('INSERT INTO usuarios (usuario,senha) VALUES (:usuario,:senha)');

    $query->bindValue(':usuario', $usuario);
    $query->bindValue(':senha', $senha);

    $query->execute();

    $erro = 'Registrado com sucesso!';
    header("location:login.php?erro=$erro");
} else {
    $erro = 'Preencha todos os campos!';
    header("location:registrar.php?erro=$erro");
}