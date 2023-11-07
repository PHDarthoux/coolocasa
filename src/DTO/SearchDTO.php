<?php

namespace App\DTO;

use App\Entity\RoommateOffer;

class SearchDTO
{
    private string $wish = RoommateOffer::class;
    private string $city = "";
    private $lodging;

    // public function __construct(
    //     $wish = RoommateOffer::class,
    //     $city = "")
    // {
    //     $this->wish = $wish;
    //     $this->city = $city;
    // }

    public function getWish(): string
    {
        return $this->wish;
    }

    public function setWish(string $wish)
    {
        $this->wish = $wish;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    public function getLodging()
    {
        return $this->lodging;
    }

    public function setLodging($lodging)
    {
        $this->lodging = $lodging;
    }
}
