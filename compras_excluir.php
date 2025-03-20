<?php

require('inc/banco.php');

$id = $_GET['id'] ?? null;

if ($id) {
    $query = $pdo->prepare('DELETE FROM compras WHERE ID = :id');

    $query->bindValue(':id',$id);

    $query->execute();

    header('location:compras.php');
}