<?php
namespace App\Entity;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Exception\InvalidArgumentException;
use Symfony\Component\Validator\Validation;

class User
{
    private int $id;

    private string $userName;

    private string $email;

    private string $password;

    private DateTime $createdDate;


    function __construct(int $id, string $userName, 
    string $email, string $password) 
    {
        $this->validate($id, $userName, $email, $password);
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->createdDate = new DateTime("now");
    }


    private function validate(int $id, string $userName, 
        string $email, string $password) 
    {
        $validator = Validation::createValidator();
        $errors = $validator->validate([
            'id' => $id,
            'userName' => $userName,
            'email' => $email,
            'password' => $password,
        ],
        new Assert\Collection(
            [
                'id' => new Assert\NotBlank(),
                'userName' => new Assert\Length(max: 50, min: 6),
                'email' => new Assert\Email(),
                'password' => new Assert\Length(max: 50, min: 8)
            ]
            )
        );

        if (count($errors) > 0) {
            $errorString = (string) $errors;
            throw new InvalidArgumentException($errorString);
        }
            
    }
    
    public function getId() {
        return $this->id;
    }


    public function getUserName() {
        return $this->userName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCreatedDate() {
        return $this->createdDate;
    }

    
    public function __toString() {
        return "id: ".$this->id.";\nusername: ".$this->userName.";\nemail: ".
        $this->email.";\npassword: ".$this->password;
    }
}