<?php
    class Todo extends DB {
        public $title;
        public $userId;

        public function __construct($title, $userId) {
            $this->title = $title;
            $this->userId = $userId;
        }

        public function createTodo() {
           $this->connect()->prepare();
        }
    }
