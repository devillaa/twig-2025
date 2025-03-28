<?php

require_once('twig_carregar.php');
require_once('inc/banco.php');

if ($_SERVER['REQUEST_METHOD']=="GET"){
    

    $id = $_GET['id'];
    $query = $pdo->prepare('SELECT * FROM compromissos WHERE id = :id');
    $query->bindValue(':id', $id);
    $query->execute();

    $compromissos = $query->fetch(PDO::FETCH_ASSOC);


    echo $twig->render('compromissoEditar.html',[
        'titulo' => 'Editando Compromisso',
        'id' => $_GET['id'],
        'editando' => $compromissos,
    ]);
} else {
    
    
    $id = $_POST['id'] ?? null;
    $newtitulo = $_POST['newtitulo'] ?? null; 
    $newdata = $_POST['newdata'] ?? null;

    if ($id) {
        $query = $pdo->prepare('UPDATE compromissos SET titulo = :newtitulo, data = :newdata WHERE ID = :id;
    ');

        $query->bindValue(':id', $id);
        $query->bindValue(':newtitulo', $newtitulo);
        $query->bindValue(':newdata', $newdata);

        $query->execute();

        header('location:compromissos.php');
    }
}


