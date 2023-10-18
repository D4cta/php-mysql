<?php

session_start();

include_once('mysql.php');
include_once('variables.php');

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id'])) {
    echo('Il faut un identifiant de recette pour le modifier');
    return;
}

$retrieveRecipeStatement = $db->prepare('SELECT * FROM recipes WHERE recipe_id = :id');
$retrieveRecipeStatement->execute([
    'id' => $getData['id'],
]);

$recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);
?>

<!-- contact.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Modifier une recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">

    <div class="container">
        <?php include_once('header.php'); ?>
        <h1>Mettre à jour <?php echo($recipe['title']); ?></h1>
        <form action="<?php echo ('post_update.php'); ?>" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Titre de la recette</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="t" value= <?php echo $recipe['title']?>>
                <div id="title-help" class="form-text">Choisissez un titre percutant</div>
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Description de la recette</label>
                <textarea class="form-control" id="title" name="recipe" placeholder="Donnez la recette uniquement si elle recette vous appartient !"><?php echo $recipe['recipe']?></textarea>
            </div>
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">identifiant de la recette</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $getData['id'] ?>">
            </div>
            <button type="submit" class="btn btn-primary" >Envoyer</button>
        </form>
    </div>
    <? include_once('/footer.php'); ?>
</body>
</html>