<?php

require_once('vendor/autoload.php');
date_default_timezone_set('America/Sao_paulo');

use Carbon\Carbon;

// Agora

echo Carbon::now() . '<br>' ;

// Adiciona um dia

echo Carbon::now()->addDay() . '<br>';

// Subtrair uma semana

echo Carbon::now()->subWeek() . '<br>';

// Adiciona quatro anos
echo 'Próximas olimpíadas: ' .
    Carbon::createFromDate(2024)->addYears(4)->year .
    '<br>';
    ;

// Idade de alguém

echo 'Sua idade é: ' . Carbon::createFromDate(2007, 7, 19)->age . '<br>';

$nascimento = Carbon::createFromDate(2007, 7, 19);

echo Carbon::now()->diff($nascimento) . '<br>';

// Final de semana
if(Carbon::now()->isWeekend()){
    echo 'Festa!';
} else {
    echo 'No hay festa';
}