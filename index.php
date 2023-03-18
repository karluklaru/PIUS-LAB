<?php
include 'vendor/autoload.php';

use App\Entity\Comment;
use App\Entity\User;
use Symfony\Component\Validator\Exception\InvalidArgumentException;

try {
    $user1 = new User(120, "userName2", "pop@gmail.com", "qwerty123");
}
catch (InvalidArgumentException $ex) {
    echo $ex->getMessage()."\n";
}

try {
    $user2 = new User(1, "user1", "nina", "pass");
}
catch (InvalidArgumentException $ex) {
    echo $ex->getMessage()."\n";
}

$comments = [
    new Comment($user1, "Hello! My name is Alexander!"),
    new Comment(new User(3, "mimixo", "mur@gmail.com", "qwerty123"),
         "Hello! My name is Marina!"),
    new Comment(new User(9000, "helloworld", "hello@gmail.com", "qwerty123"),
         "Hello! My name is Sergey!"),
];

$value = readline("input date: ");
$datetime = new DateTime($value);

foreach($comments as $comment) {
    if ($comment->getUser()->getCreatedDate() > $datetime) {
        echo $comment."\n";
    }
}
