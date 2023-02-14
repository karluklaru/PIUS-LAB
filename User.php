<?php
include 'vendor/autoload.php';
use Symfony\Component\Validator\Constraints as Assert;

class User 
{
    private int $id;
    
    private string $userName;

    private string $email;

    private string $password;


    function __construct(int $id, string $userName, 
    string $email, string $password) 
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
    }
}