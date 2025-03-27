<?php

require('inc/banco.php');
$id = $_GET['id'] ?? null;

if ($id) {
    $query = $pdo->prepare('DELETE FROM compromissos WHERE ID = :id');

    $query->bindValue(':id',$id);

    $query->execute();

    header('location:compromissos.php');
}
