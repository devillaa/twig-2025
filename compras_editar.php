<?php

require_once('twig_carregar.php');
require_once('inc/banco.php');

if ($_SERVER['REQUEST_METHOD']=="GET"){
    echo $twig->render('editar.html',[
        'titulo' => 'Editando item',
        'id' => $_GET['id'],
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


