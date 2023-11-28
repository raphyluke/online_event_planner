<?php

namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Users;

#[ORM\Entity(repositoryClass: EventsRepository::class)]
class Events
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $EventID = null;

    #[ORM\Column]
    private ?string $title = null;

    #[ORM\Column]
    private ?string $description = null;

    #[ORM\Column]
    private ?string $startDate = null;

    #[ORM\Column]
    private ?string $endDate = null;

    #[ORM\Column]
    private ?string $location = null;

    // UserID foreign key
    #[ORM\OneToOne(targetEntity: Users::class, inversedBy: 'events')]
    #[ORM\JoinColumn(name: 'organizerID', referencedColumnName: 'user_id')]
    private ?int $organizerID = null;


    public function getId(): ?int
    {
        return $this->EventID;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setdescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getOrganizerID(): ?int
    {
        return $this->organizerID;
    }

    public function setOrganizerID(int $organizerID): static
    {
        $this->organizerID = $organizerID;

        return $this;
    }


}
