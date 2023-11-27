<?php

namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventsRepository::class)]
class Events
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $EventID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventID(): ?int
    {
        return $this->EventID;
    }

    public function setEventID(int $EventID): static
    {
        $this->EventID = $EventID;

        return $this;
    }
}
