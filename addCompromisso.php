<?php

require('inc/banco.php');
require_once('vendor/autoload.php');
date_default_timezone_set('America/Sao_paulo');

use Carbon\Carbon;


$titulo = $_POST['titulo'] ?? null;
$d = $_POST['data'] ?? null;
$data = Carbon::parse($d, null, true);

if ($titulo && $data->isValid()) {
    $query = $pdo->prepare('INSERT INTO compromissos (titulo, data) VALUES (:titulo,:data)');

    $query->bindValue(':titulo', $titulo);
    $query->bindValue(':data', $data->toDateTimeString());

    $query->execute();

    header('location:compromissos.php');
} else {
    header('Location: compromissos.php');
}