<?php
namespace App\Entity;

class Comment {
    private User $user;
    private string $text;

    function __construct(User $user, string $text) {
        $this->user = $user;
        $this->text = $text;
    }

    public function getUser() {
        return $this->user;
    }

    public function __toString()
    {
        return "user {\n".$this->user."\n}\ntext: ".$this->text."\n";
    }

}