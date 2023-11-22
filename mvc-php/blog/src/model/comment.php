<?php
    // src/model/comment.php

    function getComments(string $post){

        $database = commentDbConnect();

        $statement = $database->prepare(

            "SELECT id, author, comment,
            DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss')
            AS french_creation_date FROM comments WHERE post_id = ?
            ORDER BY comment_date DESC"

        );

        $statement->execute([$post]);
        $comments = [];

        while (($row = $statement->fetch())) {

            $comment = [
                'author' => $row['author'],
                'french_creation_date' => $row['french_creation_date'],
                'comment' => $row['comment'],
            ];

            $comments[] = $comment;
        }
        return $comments;

    }


    function createComment(string $post, string $author, string $comment){

        $database = commentDbConnect();

        $statement = $database->prepare(
            'INSERT INTO comments(post_id, author, comment, comment_date)
            VALUES(?, ?, ?, NOW())'
        );

        $affectedLines = $statement->execute([$post, $author, $comment]);
        return ($affectedLines > 0);

    }


    function commentDbConnect(){

        try {

            $database = new PDO('mysql:host=localhost;dbname=root;charset=root',
            'blog', 'password');
            return $database;
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
