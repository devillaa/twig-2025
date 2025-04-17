<?php

session_start();
require_once('twig_carregar.php');
require('inc/banco.php');

if ($_SERVER['REQUEST_METHOD']=="GET"){

    $usuario = $_SESSION['usuario'];

    echo $twig->render('trocasenha.html', [
        'titulo' => 'Trocar senha',
        'usuario' => $usuario,
    ]);


} else {

    $novasenha = password_hash($_POST['novasenha'],PASSWORD_DEFAULT );
    $id = $_SESSION['id'] ?? '';
    
    if ($id) {
        $query = $pdo->prepare('UPDATE usuarios SET senha = :novasenha WHERE id = :id;
    ');

        $query->bindValue(':id', $id);
        $query->bindValue(':novasenha', $novasenha);
        $query->execute();

        header("location:trocasenha.php");
    }
}


