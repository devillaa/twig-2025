<?php

require_once('twig_carregar.php');
require_once('inc/banco.php');

if (isset($_SESSION['usuario'])) {
    $dados = $pdo->query('SELECT * FROM compras');

    $comp = $dados->fetchAll(PDO::FETCH_ASSOC);


    echo $twig->render('compras.html', [
        'titulo' => 'Compras',
        'compras' => $comp,
    ]);
} else {
    header("location:login.php");
}
