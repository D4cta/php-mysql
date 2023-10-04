<?php

// Validation du formulaire
if (isset($_POST['email']) && isset($_POST['password'])) {
    foreach ($users as $user) {
        if ( ... ) {
            $loggedUser = [ 'email' => $user['email'], ];
            }
        else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de
            vous identifier : (%s/%s)', $_POST['email'], $_POST['password']);
            }
        }
    }
 ?>

 <!-- Si utilisateur/trice est non identifié(e), on affiche le formulaire -->
 <?php if ( ... ) : ?>
 <form action = ... method = ...>
 <!-- si message d'erreur on l'affiche -->
 <?php if ( ... ) : ?>
<?php

// Validation du formulaire
if (isset($_POST['email']) && isset($_POST['password'])) {
    foreach ($users as $user) {
        if ( ... ) {
            $loggedUser = [ 'email' => $user['email'], ];
            }
        else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de
            vous identifier : (%s/%s)', $_POST['email'], $_POST['password']);
            }
        }
    }
 ?>
 

 <!-- Si utilisateur/trice est non identifié(e), on affiche le formulaire -->
 <?php if ( ... ) : ?>
 <form action = ... method = ...>
 <!-- si message d'erreur on l'affiche -->
 <?php if ( ... ) : ?>
