<?php
declare(strict_types=1);
class UserService extends UserModell{
    private $userModel;

    public function __construct(UserModell $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAllUsers():array{
        return $this->userModel->getUsers();
    }

    public function getUserById(int $id):array{
        return $this->userModel->getUser($id);
    }

    public function createUser(string $name){
        return $this->userModel->setUser($name);
    }
}