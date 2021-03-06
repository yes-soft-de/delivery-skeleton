<?php

namespace App\Request;

class StoreOwnerBranchCreateRequest
{
    private $ownerID;
    private $location = [];
    private $city;
    private $branchName;
    private $isActive;
      
    /**
    * @param mixed $ownerID
    */
    public function setOwnerID($ownerID): void
    {
        $this->ownerID = $ownerID;
    }

    /**
    * @return mixed
    */
    public function getOwnerID()
    {
        return $this->ownerID;
    }
}
