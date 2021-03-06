<?php

namespace App\Entity;

use App\Repository\StoreOwnerProfileEntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StoreOwnerProfileEntityRepository::class)
 */
class StoreOwnerProfileEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $storeOwnerID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $storeOwnerName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $story;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $branch;

     /**
     * @ORM\Column(type="string", length=100)
     */
    private $status;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $free;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $roomID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     */
    private $storeCategoryId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    public function getStoreOwnerID(): ?string
    {
        return $this->storeOwnerID;
    }

    public function setStoreOwnerID(string $storeOwnerID): self
    {
        $this->storeOwnerID = $storeOwnerID;

        return $this;
    }

    public function getStoreOwnerName(): ?string
    {
        return $this->storeOwnerName;
    }

    public function setStoreOwnerName(string $storeOwnerName): self
    {
        $this->storeOwnerName = $storeOwnerName;

        return $this;
    }

    public function getStory(): ?string
    {
        return $this->story;
    }

    public function setStory(?string $story): self
    {
        $this->story = $story;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBranch(): ?string
    {
        return $this->branch;
    }

    public function setBranch(string $branch): self
    {
        $this->branch = $branch;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getFree(): ?bool
    {
        return $this->free;
    }

    public function setFree(?bool $free): self
    {
        $this->free = $free;

        return $this;
    }

    public function getRoomID(): ?string
    {
        return $this->roomID;
    }

    public function setRoomID(?string $roomID): self
    {
        $this->roomID = $roomID;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getStoreCategoryId(): ?int
    {
        return $this->storeCategoryId;
    }

    public function setStoreCategoryId(?int $storeCategoryId): self
    {
        $this->storeCategoryId = $storeCategoryId;

        return $this;
    }
}
