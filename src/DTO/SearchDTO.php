<?php

declare(strict_types=1);

namespace App\DTO;

use App\Entity\RentalSearch;
use App\Entity\RoommateOffer;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Représente un objet de transfert de données (DTO) pour la recherche d'annonces.
 *
 * Cette classe est utilisée pour encapsuler les critères de recherche d'annonces, tels que le souhait,
 * la ville et éventuellement un ou plusieurs types de logement.
 */
class SearchDTO
{
    public const WISH_LIST = [
        RoommateOffer::class,
        RentalSearch::class,
    ];
    private string $wish = RoommateOffer::class;
    private string $city = '';
    private Collection $lodgingTypes;

    public function __construct()
    {
        $this->lodgingTypes = new ArrayCollection();
    }

    public function getWish(): string
    {
        return $this->wish;
    }

    public function setWish(string $wish): static
    {
        $this->wish = self::WISH_LIST[$wish];

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

    public function getLodgingTypes(): Collection
    {
        return $this->lodgingTypes;
    }

    public function setLodgingTypes($lodgingTypes): static
    {
        $this->lodgingTypes = $lodgingTypes;

        return $this;
    }
}
