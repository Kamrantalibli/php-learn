<?php 
    class Comment {
        public $username;
        public $text;
        public $likes;
        public $dislikes;


        function __construct(string $username, string $text, int $likes = 0, int $dislikes = 0) {
            $this->username = $username;
            $this->text = $text;
            $this->likes = $likes;
            $this->dislikes = $dislikes;
        }

        function display_comments() {
            return "{$this->username} says; {$this->text}  likes: {$this->likes} dislikes: {$this->dislikes} <br>";
        }
    }
?>