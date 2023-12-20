<?php

class User
{
    private string $full_name = '';
    private string $email = '';

    public function __construct(string $full_name, string $email)
    {
        $this->full_name = $full_name;
        $this->email = $email;
    }

    public function describe() : string
    {
        return $this->full_name . ' (' . $this->email . ')';
    }
}
