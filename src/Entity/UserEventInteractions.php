<?php

namespace App\Entity;

use App\Repository\UserEventInteractionsRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Users;
use App\Entity\Events;

#[ORM\Entity(repositoryClass: UserEventInteractionsRepository::class)]
class UserEventInteractions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $InteractionID = null;

    // userID foreign key, eventID foreign key, interactionType, timestamp

    // UserID foreign key
    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'userEventInteractions')]
    #[ORM\JoinColumn(name: 'userID', referencedColumnName: 'user_id')]
    private ?int $userID = null;

    // EventID foreign key
    #[ORM\ManyToOne(targetEntity: Events::class, inversedBy: 'userEventInteractions')]
    #[ORM\JoinColumn(name: 'eventID', referencedColumnName: 'event_id')]
    private ?int $eventID = null;

    // InteractionType
    #[ORM\Column]
    private ?string $interactionType = null;

    // Timestamp
    #[ORM\Column]
    private ?string $timestamp = null;

    public function getId(): ?int
    {
        return $this->InteractionID;
    }

    public function getUserID(): ?int
    {
        return $this->userID;
    }

    public function setUserID(int $userID): static
    {
        $this->userID = $userID;

        return $this;
    }

    public function getEventID(): ?int
    {
        return $this->eventID;
    }

    public function setEventID(int $eventID): static
    {
        $this->eventID = $eventID;

        return $this;
    }

    public function getInteractionType(): ?string
    {
        return $this->interactionType;
    }

    public function setInteractionType(string $interactionType): static
    {
        $this->interactionType = $interactionType;

        return $this;
    }

    public function getTimestamp(): ?string
    {
        return $this->timestamp;
    }

    public function setTimestamp(string $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getInteractionType();
    }

    public function __construct()
    {
        $this->timestamp = date("Y-m-d H:i:s");
    }
}
