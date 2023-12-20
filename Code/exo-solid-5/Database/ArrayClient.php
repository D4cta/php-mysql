<?php

require_once 'DatabaseInterface.php';

class ArrayClient implements DatabaseInterface
{
    private function users()
    {
        return [
            [
                'full_name' => 'Mickaël Andrieu',
                'email' => 'mickael.andrieu@exemple.com',
            ],
            [
                'full_name' => 'Mathieu Nebra',
                'email' => 'mathieu.nebra@exemple.com',
            ],
            [
                'full_name' => 'Laurène Castor',
                'email' => 'laurene.castor@exemple.com',
            ],
        ];
    }

    public function fetchAll() : array
    {
        return $this->users();
    }
}