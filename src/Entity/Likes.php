<?php

namespace App\Entity;

use App\Repository\LikesRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Users;
use App\Entity\Events;
use Doctrine\ORM\Mapping\JoinColumn;

#[ORM\Entity(repositoryClass: LikesRepository::class)]
class Likes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $ReactionID = null;

    // userID foreign key, eventID foreign key, isLike, timestamp
    #[ORM\Column]
    private ?bool $isLike = null;

    // UserID foreign key
    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'likes')]
    #[JoinColumn(name: 'UserID', referencedColumnName: 'user_id')]
    private ?int $userID = null;

    // EventID foreign key
    #[ORM\ManyToOne(targetEntity: Events::class, inversedBy: 'likes')]
    #[JoinColumn(name: 'EventID', referencedColumnName: 'event_id')]
    private ?int $eventID = null;

    // Timestamp
    #[ORM\Column]
    private ?string $timestamp = null;

    public function getIsLike(): ?bool
    {
        return $this->isLike;
    }

    public function setIsLike(bool $isLike): static
    {
        $this->isLike = $isLike;

        return $this;
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

    public function getId(): ?int
    {
        return $this->ReactionID;
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
}
