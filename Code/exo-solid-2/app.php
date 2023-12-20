<?php

require_once 'MusicReader.php';

function it($m,$p){
    echo"\033[3",$p?'2m✔︎':'1m✘'.register_shutdown_function(function(){die(1);})," $m\033[0m\n";
}

$mp3File = 'wannabee.mp3';
$musicReader = new MusicReader($mp3File);

it('On écoute un fichier Mp3', $musicReader->listen() === 'Lecture du fichier Mp3 wannabee.mp3');

$oggFile = 'happy.ogg';
$musicReader = new MusicReader($oggFile);

it('On écoute un fichier Ogg', $musicReader->listen() === 'Lecture du fichier Ogg happy.ogg');