<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\RoommateOfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoommateOfferRepository::class)]
class RoommateOffer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $area = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $disponibility = null;

    #[ORM\Column]
    private ?bool $furnished = null;

    #[ORM\Column]
    private ?bool $smokerAccepted = null;

    #[ORM\Column]
    private ?bool $animalAccepted = null;

    #[ORM\Column]
    private ?bool $handicapAccess = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $addressLine1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $addressLine2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $postalCode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\OneToOne(mappedBy: 'roommateOffer', cascade: ['persist', 'remove'])]
    private ?Offer $offer = null;

    #[ORM\OneToMany(mappedBy: 'roommateOffer', targetEntity: Media::class)]
    private Collection $medias;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $availabilityDate = null;

    #[ORM\ManyToOne(inversedBy: 'roommateOffers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?LodgingType $lodgingType = null;

    public function __construct()
    {
        $this->medias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArea(): ?int
    {
        return $this->area;
    }

    public function setArea(int $area): static
    {
        $this->area = $area;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDisponibility(): ?\DateTimeInterface
    {
        return $this->disponibility;
    }

    public function setDisponibility(\DateTimeInterface $disponibility): static
    {
        $this->disponibility = $disponibility;

        return $this;
    }

    public function isFurnished(): ?bool
    {
        return $this->furnished;
    }

    public function setFurnished(bool $furnished): static
    {
        $this->furnished = $furnished;

        return $this;
    }

    public function isSmokerAccepted(): ?bool
    {
        return $this->smokerAccepted;
    }

    public function setSmokerAccepted(bool $smokerAccepted): static
    {
        $this->smokerAccepted = $smokerAccepted;

        return $this;
    }

    public function isAnimalAccepted(): ?bool
    {
        return $this->animalAccepted;
    }

    public function setAnimalAccepted(bool $animalAccepted): static
    {
        $this->animalAccepted = $animalAccepted;

        return $this;
    }

    public function isHandicapAccess(): ?bool
    {
        return $this->handicapAccess;
    }

    public function setHandicapAccess(bool $handicapAccess): static
    {
        $this->handicapAccess = $handicapAccess;

        return $this;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(?string $addressLine1): static
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $addressLine2): static
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

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
            $this->offer->setRoommateOffer(null);
        }

        // set the owning side of the relation if necessary
        if (null !== $offer && $offer->getRoommateOffer() !== $this) {
            $offer->setRoommateOffer($this);
        }

        $this->offer = $offer;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

    public function addMedia(Media $media): static
    {
        if (!$this->medias->contains($media)) {
            $this->medias->add($media);
            $media->setRoommateOffer($this);
        }

        return $this;
    }

    public function removeMedia(Media $media): static
    {
        if ($this->medias->removeElement($media)) {
            // set the owning side to null (unless already changed)
            if ($media->getRoommateOffer() === $this) {
                $media->setRoommateOffer(null);
            }
        }

        return $this;
    }

    public function getAvailabilityDate(): ?\DateTimeInterface
    {
        return $this->availabilityDate;
    }

    public function setAvailabilityDate(\DateTimeInterface $availabilityDate): static
    {
        $this->availabilityDate = $availabilityDate;

        return $this;
    }

    public function getLodgingType(): ?LodgingType
    {
        return $this->lodgingType;
    }

    public function setLodgingType(?LodgingType $lodgingType): static
    {
        $this->lodgingType = $lodgingType;

        return $this;
    }
}
