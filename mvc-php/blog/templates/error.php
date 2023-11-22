<?php
    // index.php

    require_once('src/controllers/add_comment.php');
    require_once('src/controllers/homepage.php');
    require_once('src/controllers/post.php');
    
    try {

    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
        require('templates/error.php');
    }
