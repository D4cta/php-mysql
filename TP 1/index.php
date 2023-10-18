<!-- index.php -->
<!DOCTYPE html>
<html>
    <head>
        <title>Notre première instruction : echo</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Affichage de texte avec PHP</h2>
        <p>
            Cette ligne a été écrite entièrement en HTML.<br />
            <?php
                $mickael = ['Mickaël Andrieu', 'papa.maman@e.com', 'S3cr3t', 34];
                $mathieu = ['Mathieu Nebra', 'mathieu.girolet@e.com', 'devine', 33];
                $laurene = ['Laurène Castor', 'laura.brooks@e.com', 'P4ssw0rD', 28];
                $users = [$mickael, $mathieu, $laurene];
                echo $users[1][1] . " "; // "mathieu.nebra@exemple.com"

                echo "<br>";

                for ($line = 0; $line <= 2; $line++)
                {
                    echo $users[$line][0] . '<br />';
                }
            ?>
        </p>
    </body>
</html>