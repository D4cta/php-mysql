<?php

class FileInformation {
    public function getExtension($name) { return pathinfo($name, PATHINFO_EXTENSION); }

}