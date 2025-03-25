<?php

require_once('twig_carregar.php');
date_default_timezone_set('America/Sao_paulo');
use Carbon\Carbon;


$hoje = Carbon::now()->format("y-m-d");
$amanha = Carbon::now()->addDay(1)->format("y-m-d");


echo $twig->render('horario.html',[
    'titulo' => 'Horário',
    'hoje' => $hoje,
    'amanha' => $amanha,
]);