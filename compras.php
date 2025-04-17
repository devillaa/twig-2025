<?php

require_once('twig_carregar.php');
require_once('inc/banco.php');

session_start();
$usuario = $_SESSION['usuario'];

if (isset($_SESSION['usuario'])) {
    $dados = $pdo->query('SELECT * FROM compras');

    $comp = $dados->fetchAll(PDO::FETCH_ASSOC);


    echo $twig->render('compras.html', [
        'titulo' => 'Compras',
        'compras' => $comp,
        'usuario' => $usuario,
    ]);
} else {
    header("location:login.php");
}
