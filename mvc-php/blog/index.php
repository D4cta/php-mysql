<?php

ini_set("display_errors",1);
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/add_comment.php');

use Application\Controller\Homepage\Homepage;
use Application\Controller\Post\Post;
use Application\Controller\AddComment\AddComment;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                $post = new Post();
                $post->post($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                $comment = new AddComment();
                $comment->addComment($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        $homepage = new Homepage();
        $homepage->homepage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}