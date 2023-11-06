<?php 

session_start();
        include __DIR__ . '/model/model_teams.php';
        include __DIR__ . '/functions.php';

        session_unset(); 
        session_destroy(); 

        header('Location: view_teams.php');
        ?>

