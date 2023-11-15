<?php

    function getPosts() {
        // We connect to the database.

        try {
            $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8',
            'blog', 'password');
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }


        // We retrieve the 5 last blog posts.

        $statement = $database->query(
            "SELECT id, title, content, DATE_FORMAT(date_creation,
            '%d/%m/%Y à %Hh%imin%ss') AS date_creation_fr FROM posts
            ORDER BY date_creation DESC LIMIT 0, 5"
        );

        $posts = [];
        while (($row = $statement->fetch())) {

            $post = [
                'title' => $row['title'],
                'french_creation_date' => $row['date_creation_fr'],
                'content' => $row['text'],
            ];
            
            $posts[] = $post;
        }
        return $posts;
    }

