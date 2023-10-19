<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'media', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'medias')]
    private ?RoommateOffer $roommateOffer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if (null === $user && null !== $this->user) {
            $this->user->setMedia(null);
        }

        // set the owning side of the relation if necessary
        if (null !== $user && $user->getMedia() !== $this) {
            $user->setMedia($this);
        }

        $this->user = $user;

        return $this;
    }

    public function getRoommateOffer(): ?RoommateOffer
    {
        return $this->roommateOffer;
    }

    public function setRoommateOffer(?RoommateOffer $roommateOffer): static
    {
        $this->roommateOffer = $roommateOffer;

        return $this;
    }
}
