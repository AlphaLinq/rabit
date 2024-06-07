<?php
declare(strict_types=1);
class UserModell extends Dbh{
    //Sends all data from the users table
    protected function getUsers():array
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);

        $result = $stmt->fetchAll();
        return $result;
    }

    //Fetches a specific user by their ID
    protected function getUser(int $id):array{
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        $result = $stmt->fetchAll();
        return $result;
    }

    //Sets a new user into the 'users' table
    protected function setUser(string $name):void{
        $sql = 'INSERT INTO users(name) VALUES (:name)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':name' => $name]);
    }
}

?>