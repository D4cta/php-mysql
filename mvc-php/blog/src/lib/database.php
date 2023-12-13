<?php
namespace Application\Lib\Database;
use \PDO;

class DatabaseConnection
{
    public $database = null;

    public function getConnection(): PDO
    {
        if ($this->database === null) {
            $this->database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        }
        return $this->database;
    }
}