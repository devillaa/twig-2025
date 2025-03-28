<?php

require_once('twig_carregar.php');
require_once('inc/banco.php');


$dados = $pdo->query('SELECT * FROM compromissos');

$compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);


echo $twig->render('compromissos.html',[
    'titulo' => 'Lista de Compromissos',
    'compromissos' => $compromissos,
]);