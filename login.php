<?php

require_once('twig_carregar.php');

$erro =  $_GET["erro"] ?? null;

echo $twig->render('login.html', [
   'erro' => $erro ,
]);