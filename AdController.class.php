<?php

class AdController{
    private $adService;
    private $userService;

    public function __construct(AdService $adService, UserService $userService)
    {
        $this->adService = $adService;
        $this->userService = $userService;
    }

    public function showAllAds():array{
        $ads = $this->adService->getAllAds();
        return $ads;
    }

    public function showMentioned($ad){
        $user = $this->userService->getUserById($ad['userid']);
        return $user;
    }
}