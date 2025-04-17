<?php

require_once('twig_carregar.php');
date_default_timezone_set('America/Sao_paulo');
use Carbon\Carbon;
session_start();
$usuario = $_SESSION['usuario'];

if (isset($_SESSION['usuario'])){
    $hoje = Carbon::now()->format("d-m-y");
    $amanha = Carbon::now()->addDay(1)->format("d-m-y");


    echo $twig->render('horario.html',[
        'titulo' => 'Horário',
        'hoje' => $hoje,
        'amanha' => $amanha,
        'usuario' => $usuario,
    ]);
} else {
    header('location:login.php');
}

