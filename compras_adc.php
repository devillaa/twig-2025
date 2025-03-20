<?php

require('inc/banco.php');

$item = $_POST['item'] ?? null;

if ($item) {
    $query = $pdo->prepare('INSERT INTO compras (item) VALUES (:it)');

    $query->bindValue(':it', $item);

    $query->execute();

    header('location:compras.php');
} else {
    header('location:compras.php');
}