<?php

require_once('twig_carregar.php');
require_once('inc/banco.php');

if ($_SERVER['REQUEST_METHOD']=="GET"){
    
    $id = $_GET['id'];
    $query = $pdo->prepare('SELECT * FROM compras WHERE id = :id');
    $query->bindValue(':id', $id);
    $query->execute();

    $compras = $query->fetch(PDO::FETCH_ASSOC);
    
    echo $twig->render('editar.html',[
        'titulo' => 'Editando item',
        'id' => $_GET['id'],
        'editando' => $compras,
    ]);
} else {
    
    
    $id = $_POST['id'] ?? null;
    $new = $_POST['new'] ?? null; 

    if ($id) {
        $query = $pdo->prepare('UPDATE compras SET item = :new WHERE ID = :id;
    ');

        $query->bindValue(':id', $id);
        $query->bindValue(':new', $new);

        $query->execute();

        header('location:compras.php');
    }
}


