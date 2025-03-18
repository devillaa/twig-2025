<?php

#Não se deve salvar senhas diretamente no arquivo (Como estamos fazendo aqui)
$pdo = new PDO('mysql:host=localhost;dbname=3info', 'root', '');