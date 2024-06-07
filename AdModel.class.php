<?php

class AdModel extends Dbh{
    //Fetches all data from the 'advertisements' table
    protected function getAds():array{
        $sql = "SELECT * FROM advertisements";
        $stmt = $this->connect()->query($sql);

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function setAd(string $userid,string $title){
        $sql = 'INSERT INTO advertisements(userid,title) VALUES (:userid,:title)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':userid' => $userid, ':title' => $title]);
    }
}