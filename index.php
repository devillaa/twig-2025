<?php

require_once('twig_carregar.php');
session_start();

$usuario = $_SESSION['usuario'];

if (isset($_SESSION['usuario'])){

    echo $twig->render('index.html', [
        'fruta' => 'Abacaxi',
        'usuario' => $usuario,
    ]);

} else {
    header('location:login.php');
}