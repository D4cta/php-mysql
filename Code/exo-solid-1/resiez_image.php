<?php

class ResizeImage {

    public function resize($extention, $origin, $destination, $width, $maxHeight) {
        
        $type = $extention;
        $pngFamily = ['PNG', 'png'];
        $jpegFamily = ['jpeg', 'jpg', 'JPG'];
        
        
        if (in_array($type, $jpegFamily)) {
            $type = 'jpeg';
        } 
        
        elseif (in_array($type, $pngFamily)) {
            $type = 'png';
        }
        
        $function = 'imagecreatefrom' . $type;

        if (!is_callable($function)) {
            return false;
        }

        $image = $function($origin);

        $imageWidth = \imagesx($image);
        
        
        if ($imageWidth < $width) {
            
            if (!copy($origin, $destination)) {
                throw new Exception("Impossible de copier le fichier {$origin} vers {$destination}");
            }

        } 
        
        
        else {
            
            $imageHeight = \imagesy($image);
            $height = (int) (($width * $imageHeight) / $imageWidth);
            
            if ($height > $maxHeight) {

                $height = $maxHeight;
                $width = (int) (($height * $imageWidth) / $imageHeight);
            
            }
            
            $newImage = \imagecreatetruecolor($width, $height);

            if ($newImage !== false) {

                \imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, $imageWidth, $imageHeight);

                $function = 'image' . $type;

                if (!is_callable($function)) {

                    return false;
                    
                }

                $function($newImage, $destination);

                \imagedestroy($newImage);
                \imagedestroy($image);
            }
        }
    }
}