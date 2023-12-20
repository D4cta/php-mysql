<?php

require_once 'RepositoryInterface.php';
require_once 'User.php';

class UserRepository implements RepositoryInterface
{
    public function getUser(string $userEmail) : User
    {
        // A faire
        return new User('A implementer', 'en utilisant un client de base de données');
    }

    public function getUsers() : array
    {
        // A faire
        return [];
    }
}