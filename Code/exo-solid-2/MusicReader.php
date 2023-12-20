<?php

// Si on doit supporter un nouveau type de format, on doit modifier cette classe :(
require_once 'Mp3.php';
require_once 'Ogg.php';

class MusicReader
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function listen()
    {
        $extension = pathinfo($this->filename, PATHINFO_EXTENSION);
        switch ($extension) {
            case 'mp3':
                $mp3 = new Mp3($this->filename);
                return $mp3->listen();
                break;
            case 'ogg':
                $ogg = new Ogg($this->filename);
                return $ogg->listen();
                break;
            default:
                throw new \Exception('Aucun lecteur trouvé pour cette musique');
        }
    }
}