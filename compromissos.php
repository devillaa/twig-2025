<?php

require_once('twig_carregar.php');
require_once('inc/banco.php');


$ordem = $_GET['ordem'] ?? null;

if($ordem == 'maisrecente'){
    $dados = $pdo->query('SELECT * FROM compromissos ORDER BY DATA asc');
} else {
    $dados = $pdo->query('SELECT * FROM compromissos ORDER BY DATA desc');
} 

$compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);


echo $twig->render('compromissos.html',[
    'titulo' => 'Lista de Compromissos',
    'compromissos' => $compromissos,
]);
