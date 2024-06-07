<?php

class AdService extends AdModel
{

    private $adModel;
    public function __construct(AdModel $adModel)
    {
        $this->adModel = $adModel;
    }
    public function getAllAds():array{
        return $this->adModel->getAds();
    }
}
