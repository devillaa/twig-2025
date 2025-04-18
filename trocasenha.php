<?php

session_start();
require_once('twig_carregar.php');
require('inc/banco.php');

if ($_SERVER['REQUEST_METHOD']=="GET"){

    if (isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
        echo $twig->render('trocasenha.html', [
            'titulo' => 'Trocar senha',
            'usuario' => $usuario,
            'erro' => $_GET['erro'] ?? null,
        ]);   
    }else{
        header("location:login.php");
        exit;
    }

} else {

    $id = $_SESSION['id'] ?? '';
    $novasenha = password_hash($_POST['novasenha'],PASSWORD_DEFAULT );
    $confirmarsenha = $_POST['confirmarsenha'];
    $senhaantiga = $_POST['senhaatual'];
    
    if (password_verify($senhaantiga, $_SESSION['senha'])) {
        
        if(password_verify($confirmarsenha, $novasenha)) {
            $query = $pdo->prepare('UPDATE usuarios SET senha = :novasenha WHERE id = :id;
            ');
        
                $query->bindValue(':id', $id);
                $query->bindValue(':novasenha', $novasenha);
                $query->execute();
        
                $_SESSION['senha'] = $novasenha;

                $erro = 'Senha alterada com sucesso!';
                header("location:trocasenha.php?erro=$erro");
                exit;
        } else{
            $erro = 'Confirmar senha errado!';
            header("location:trocasenha.php?erro=$erro");
            exit;
        }
        
    
    } else {
        $erro = 'Senha Atual Incorreta!';
        header("location:trocasenha.php?erro=$erro");
        exit;
    }
}


