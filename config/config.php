<?php
        //on va faire insertion en base de donnée
    define ('DSN','mysql:dbname=pokemonProject;host=localhost;charset=utf8');
    define ('USER','Pokemon_user');
    define ('PASSWORD','e2RTpsuC7AH2]cqx');
    define('ERROR_ARRAY',[
        '0'=>'erreur générique',
        '1'=> 'Vous n\'étes pas connecté à la base de donnée.',
        '2'=>'erreur 2'
    ]);
    // Mot de passe pour générer mes clés HMAC
    define('SECRET_256', 'sdf989gfd_è-gfd');