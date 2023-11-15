<?php
    session_start();
    include_once('./mysql.php');

    $getData = $_GET;

    if (!isset($getData['id']) && is_numeric($getData['id'])){
        echo('Ne me peux supprimer sans identifiant');
        return;
    };

    $retrieveRecipeStatement = $db->prepare('DELETE FROM recipes WHERE recipe_id = :id');

    $retrieveRecipeStatement->execute([
        'id' => $getData['id'],
    ]);


    header('Location:index.php');
?>