<?php

interface RepositoryInterface
{
    /**
     * Retrieve the user
     *
     * @return User
     */
    public function getUser(string $userEmail) : User;

    /**
     * Retrieve all the available users
     *
     * @return array<User>
     */
    public function getUsers() : array;
}
