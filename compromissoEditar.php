<?php

require_once('twig_carregar.php');
require_once('inc/banco.php');

if ($_SERVER['REQUEST_METHOD']=="GET"){
    echo $twig->render('compromissoEditar.html',[
        'titulo' => 'Editando Compromisso',
        'id' => $_GET['id'],
    ]);
} else {
    
    
    $id = $_POST['id'] ?? null;
    $newtitulo = $_POST['newtitulo'] ?? null; 
    $newdata = $_POST['newdata'] ?? null;

    if ($id) {
        $query = $pdo->prepare('UPDATE compromisso SET titulo = :new, data = :newdata WHERE ID = :id;
    ');

        $query->bindValue(':id', $id);
        $query->bindValue(':newtitlo', $newtitulo);
        $query->bindValue(':newdata', $newdata);

        $query->execute();

        header('location:compromissos.php');
    }
}


