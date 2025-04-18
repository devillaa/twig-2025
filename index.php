<?php

require_once('twig_carregar.php');
session_start();



if (isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];

    echo $twig->render('index.html', [
        'titulo' => 'Inicial',
        'fruta' => 'Abacaxi',
        'usuario' => $usuario,
    ]);

} else {
    header('location:login.php');
    exit;
}