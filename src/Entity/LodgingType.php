<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LodgingTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LodgingTypeRepository::class)]
class LodgingType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'lodgingType', targetEntity: RoommateOffer::class)]
    private Collection $roommateOffers;

    #[ORM\ManyToMany(targetEntity: RentalSearch::class, mappedBy: 'LodgingType')]
    private Collection $rentalSearches;

    public function __construct()
    {
        $this->roommateOffers = new ArrayCollection();
        $this->rentalSearches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, RoommateOffer>
     */
    public function getRoommateOffers(): Collection
    {
        return $this->roommateOffers;
    }

    public function addRoommateOffer(RoommateOffer $roommateOffer): static
    {
        if (!$this->roommateOffers->contains($roommateOffer)) {
            $this->roommateOffers->add($roommateOffer);
            $roommateOffer->setLodgingType($this);
        }

        return $this;
    }

    public function removeRoommateOffer(RoommateOffer $roommateOffer): static
    {
        if ($this->roommateOffers->removeElement($roommateOffer)) {
            // set the owning side to null (unless already changed)
            if ($roommateOffer->getLodgingType() === $this) {
                $roommateOffer->setLodgingType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RentalSearch>
     */
    public function getRentalSearches(): Collection
    {
        return $this->rentalSearches;
    }

    public function addRentalSearch(RentalSearch $rentalSearch): static
    {
        if (!$this->rentalSearches->contains($rentalSearch)) {
            $this->rentalSearches->add($rentalSearch);
            $rentalSearch->addLodgingType($this);
        }

        return $this;
    }

    public function removeRentalSearch(RentalSearch $rentalSearch): static
    {
        if ($this->rentalSearches->removeElement($rentalSearch)) {
            $rentalSearch->removeLodgingType($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->type;
    }
}
