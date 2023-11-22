<?php

namespace Application\Controller\Homepage;

require_once('src/lib/database.php');
require_once('src/model/post.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Post\PostRepository;

class Homepage
{
    public function homepage()
    {
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $posts = $postRepository->getPosts();

        require('templates/homepage.php');
    }
}