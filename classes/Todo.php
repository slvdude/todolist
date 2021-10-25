<?php
    class Todo extends DB {
        public $title;
        public $userId;

        public function __construct($title, $userId) {
            $this->title = $title;
            $this->userId = $userId;
            $this->createTodo($this->title, $this->userId );
        }

        public function createTodo($title, $userId) {
           $stmt = $this->connect()->prepare('INSERT INTO tasks (`user_id`, `description`, `status`) VALUES (?, ?, ?);');
           $stmt->execute(array($title, $userId, false));
        }
    }
