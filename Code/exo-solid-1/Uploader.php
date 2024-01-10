<?php


class Uploader {

    private $name;
    private $type;
    public $directory = '';
    public $validTypes = [];
    public $error;


    public function __construct($file) {
        $fileData = $_FILES[$file];
        //$this->temporaryName = $fileData['tmp_name'];
        $this->name = $fileData['name'];
        $this->type = $fileData['type'];
        $this->validTypes = ['PNG', 'png', 'jpeg', 'jpg', 'JPG'];
    }
    
    public function getExtension() {
        $fileInformation = new FileInformation();
        return $fileInformation->getExtension($this->name);
    }


    public function getName() { 
        return $this->name;
    }

    public function resize($origin, $destination, $width, $maxHeight) {
        $type = $this->getExtension();
        $resizeImage = new ResizeImage();
        $resizeImage->resize($origin, $destination, $width, $maxHeight, $type);
     }

    public function uploadFile() {
        if (!in_array($this->type, $this->validTypes)) {
            $this->error = 'Le fichier ' . $this->name . ' n\'est pas d\'un type valide';
        }
    }
}