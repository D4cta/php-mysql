<?php

// Déclaration du tableau des recettes
$recipes = [
['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
['Couscous','[...]','mickael.andrieu@exemple.com',false,],
];

?>


<!DOCTYPE html>
    <html>
        <head>
            <title>Affichage des recettes</title>
        </head>
        <body>
            <ul>
                <?php for ($lines = 0; $lines <= 1; $lines++): ?>
                <li>
                    <?php echo $recipes[$lines][0] . ' (' . $recipes[$lines][2] . ')';?>
                </li>
                <?php endfor; ?>
            </ul>
        </body>
    </html>