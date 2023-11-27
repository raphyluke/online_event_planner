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
    private ?int $userID = null;

    // EventID foreign key
    #[ORM\ManyToOne(targetEntity: Events::class, inversedBy: 'userEventInteractions')]
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
}
