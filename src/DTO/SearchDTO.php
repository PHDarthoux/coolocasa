<?php

declare(strict_types=1);

namespace App\DTO;

use App\Entity\RoommateOffer;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Représente un objet de transfert de données (DTO) pour la recherche d'annonces.
 *
 * Cette classe est utilisée pour encapsuler les critères de recherche d'annonces, tels que le souhait,
 * la ville et éventuellement un ou plusieurs types de logement.
 */
class SearchDTO
{
    private string $wish = RoommateOffer::class;
    private string $city = '';
    private ?ArrayCollection $lodgingTypes;

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

    public function setWish(string $wish): static
    {
        $this->wish = $wish;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity($city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getLodgingTypes(): ?ArrayCollection
    {
        return $this->lodgingTypes;
    }

    public function setLodgingTypes($lodgingTypes): static
    {
        $this->lodgingTypes = $lodgingTypes;

        return $this;
    }
}
