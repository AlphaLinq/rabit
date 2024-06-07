<?php
declare(strict_types=1);
class UserController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function showAllUsers():array{
        $users = $this->userService->getAllUsers();
        return $users;
    }

    public function showUser(int $id):void {
        $user = $this->userService->getUserById($id);
        echo $user['name'];
    }

    public function createUser(string $name):void {
        $this->userService->createUser($name);
    }
}
