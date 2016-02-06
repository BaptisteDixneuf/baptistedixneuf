<?php

/**
 * Classe de configuration du site( accès bd ) et routing (module rewrite apache a activé)
 * */
class Conf {

    static $debug = 2;

    /* Identifant de connexion */
    static $databases = array(
        'default' => array(
            'host' => 'localhost',
            'database' => 'baptistedixneuf',
            'login' => 'localdev',
            'password' => 'local'
        )
    );

}

/* Prefix pour accéder à l'administration */
Router::prefix('cockpit', 'admin');

/* Règle de routage */
Router::connect('', 'posts/index');
Router::connect('cockpit', 'cockpit/posts/index');
Router::connect('blog/:slug-:id', 'posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('blog/*', 'posts/*');
Router::connect('pages/:slug-:id', 'pages/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('categories/:slug-:id', 'categories/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('links/view/:id', 'links/view/id:([0-9]+)');
?>