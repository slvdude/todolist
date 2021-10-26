<?php
    class Todo extends DB {
        public $userId;

        public function __construct($userId) {
            $this->userId = $userId;
            $this->getTodos($this->userId);
        }

        public function createTodo($userId, $title) {
           $stmt = $this->connect()->prepare('INSERT INTO `tasks` (`user_id`, `description`, `status`) VALUES (?, ?, ?);');
           $stmt->execute(array($userId, $title , false));
        }

        public function getTodos($userId) {
            $stmt = $this->connect()->prepare('SELECT * FROM `tasks` WHERE `user_id` = ?;');
            $stmt->execute(array($userId));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function deleteTodo($id) {
            $stmt = $this->connect()->prepare('DELETE FROM `tasks` WHERE id = ?;');
            $stmt->execute(array($id));
        }

        public function deleteAll() {
            $stmt = $this->connect()->prepare('DELETE FROM `tasks`;');
            $stmt->execute();
        }

        public function changeTodoStatus($id) {
            $stmt = $this->connect()->prepare('SELECT * FROM tasks WHERE `id` = ?;');
            $stmt->execute(array($id));
            $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($stmt['status'] == false) {
                $stmt = $this->connect()->prepare('UPDATE tasks SET status = 1 WHERE `id` = ?;');
                $stmt->execute(array($id));
            }
            else {
                $stmt = $this->connect()->prepare('UPDATE tasks SET status = 0 WHERE `id` = ?;');
                $stmt->execute(array($id));
            }
        }

        public function doneAll() {
            $stmt = $this->connect()->prepare('UPDATE tasks SET status = 1;');
            $stmt->execute();
        }
    }
