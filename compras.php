<?php

require_once('twig_carregar.php');
require_once('inc/banco.php');

session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $dados = $pdo->query('SELECT * FROM compras');

    $comp = $dados->fetchAll(PDO::FETCH_ASSOC);


    echo $twig->render('compras.html', [
        'titulo' => 'Compras',
        'compras' => $comp,
        'usuario' => $usuario,
    ]);
} else {
    header("location:login.php");
    exit;
}
