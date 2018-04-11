<?php
/**
 * Ex: Classe geral Facebook e classes menores p/usar Posts
 */
class Facebook
{
    public function createPost()
    {
        return new Post();
    }
}

class Post
{
    private $author;
    private $message;
    
    function setAuthor($author) {
        $this->author = $author;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    function getAuthor() {
        return $this->author;
    }

    function getMessage() {
        return $this->message;
    }
}


?>