<?php

namespace App\Entity;

use App\Repository\RentalSearchRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RentalSearchRepository::class)]
class RentalSearch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $desiredCity = null;

    #[ORM\Column(nullable: true)]
    private ?int $maxBudget = null;

    #[ORM\Column(nullable: true)]
    private ?bool $smoker = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hasAnimal = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $desiredMoveInDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $centerOfInterest = null;

    #[ORM\Column(nullable: true)]
    private ?bool $acceptSmoker = null;

    #[ORM\Column(nullable: true)]
    private ?bool $acceptAnimals = null;

    #[ORM\OneToOne(mappedBy: 'rentalSearch', cascade: ['persist', 'remove'])]
    private ?Offer $offer = null;

    #[ORM\ManyToMany(targetEntity: LodgingType::class, inversedBy: 'rentalSearches')]
    private Collection $LodgingType;

    public function __construct()
    {
        $this->LodgingType = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesiredCity(): ?string
    {
        return $this->desiredCity;
    }

    public function setDesiredCity(string $desiredCity): static
    {
        $this->desiredCity = $desiredCity;

        return $this;
    }

    public function getMaxBudget(): ?int
    {
        return $this->maxBudget;
    }

    public function setMaxBudget(?int $maxBudget): static
    {
        $this->maxBudget = $maxBudget;

        return $this;
    }

    public function isSmoker(): ?bool
    {
        return $this->smoker;
    }

    public function setSmoker(?bool $smoker): static
    {
        $this->smoker = $smoker;

        return $this;
    }

    public function isHasAnimal(): ?bool
    {
        return $this->hasAnimal;
    }

    public function setHasAnimal(?bool $hasAnimal): static
    {
        $this->hasAnimal = $hasAnimal;

        return $this;
    }

    public function getDesiredMoveInDate(): ?\DateTimeInterface
    {
        return $this->desiredMoveInDate;
    }

    public function setDesiredMoveInDate(?\DateTimeInterface $desiredMoveInDate): static
    {
        $this->desiredMoveInDate = $desiredMoveInDate;

        return $this;
    }

    public function getCenterOfInterest(): ?string
    {
        return $this->centerOfInterest;
    }

    public function setCenterOfInterest(?string $centerOfInterest): static
    {
        $this->centerOfInterest = $centerOfInterest;

        return $this;
    }

    public function isAcceptSmoker(): ?bool
    {
        return $this->acceptSmoker;
    }

    public function setAcceptSmoker(?bool $acceptSmoker): static
    {
        $this->acceptSmoker = $acceptSmoker;

        return $this;
    }

    public function isAcceptAnimals(): ?bool
    {
        return $this->acceptAnimals;
    }

    public function setAcceptAnimals(?bool $acceptAnimals): static
    {
        $this->acceptAnimals = $acceptAnimals;

        return $this;
    }

    public function getOffer(): ?Offer
    {
        return $this->offer;
    }

    public function setOffer(?Offer $offer): static
    {
        // unset the owning side of the relation if necessary
        if (null === $offer && null !== $this->offer) {
            $this->offer->setRentalSearch(null);
        }

        // set the owning side of the relation if necessary
        if (null !== $offer && $offer->getRentalSearch() !== $this) {
            $offer->setRentalSearch($this);
        }

        $this->offer = $offer;

        return $this;
    }

    /**
     * @return Collection<int, LodgingType>
     */
    public function getLodgingType(): Collection
    {
        return $this->LodgingType;
    }

    public function addLodgingType(LodgingType $lodgingType): static
    {
        if (!$this->LodgingType->contains($lodgingType)) {
            $this->LodgingType->add($lodgingType);
        }

        return $this;
    }

    public function removeLodgingType(LodgingType $lodgingType): static
    {
        $this->LodgingType->removeElement($lodgingType);

        return $this;
    }
}
