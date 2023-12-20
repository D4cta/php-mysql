<?php

require_once './Database/ArrayClient.php';
require_once './Database/JSONClient.php';
require_once './Repository/UserRepository.php';

function it($m,$p){
    echo"\033[3",$p?'2m✔︎':'1m✘'.register_shutdown_function(function(){die(1);})," $m\033[0m\n";
}

$userArrayRepository = new UserRepository(new ArrayClient());
$userJSONRepository = new UserRepository(new JSONClient());

it('Array Client Works as expected', count($userArrayRepository->getUsers()) === 3);
it('JSON Client Works as expected', count($userArrayRepository->getUsers()) === 3);

it(
    'Array Client : retrieve user by email',
    $userArrayRepository->getUser('laurene.castor@exemple.com')
        ->describe() === 'Laurène Castor (laurene.castor@exemple.com)'
);

it(
    'JSON Client : retrieve user by email',
    $userArrayRepository->getUser('mathieu.nebra@exemple.com')
        ->describe() === 'Mathieu Nebra (mathieu.nebra@exemple.com)'
);