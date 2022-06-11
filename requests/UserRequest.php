<?php

class UserRequest
{

    public function __construct($array)
    {
        $this->type = $array['type'] ?? null;
        $this->firstname = $array['firstname'] ?? null;
        $this->lastname = $array['lastname'] ?? null;
        $this->email = $array['email'];
        $this->password =  isset($array['password']) ? md5($array['password']) : null;
    }

    public function toArray()
    {
        return [
            'type' => $this->type ?? User::CLIENT,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

    public function updateUser()
    {
        return [
            'type' => $this->type,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email
        ];
    }

    public function getCredentials()
    {
        return [
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}
