<?php

require_once('twig_carregar.php');

echo $twig->render('registrar.html', [
    'erro' => $_GET['erro'] ?? null,
]);