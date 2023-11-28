<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Users;
use App\Entity\Events;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
class Comments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $CommentID = null;

    // userID foreign key, eventID foreign key, commentText, timestamp
    #[ORM\Column]
    private ?string $commentText = null;

    // UserID foreign key
    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'comments', )]
    #[ORM\JoinColumn(name: 'UserID', referencedColumnName: 'user_id')]
    private ?int $userID = null;

    // EventID foreign key
    #[ORM\ManyToOne(targetEntity: Events::class, inversedBy: 'comments')]
    #[ORM\JoinColumn(name: 'EventID', referencedColumnName: 'event_id')]
    private ?int $eventID = null;

    public function getId(): ?int
    {
        return $this->CommentID;
    }

    public function getCommentText(): ?string
    {
        return $this->commentText;
    }

    public function setCommentText(string $commentText): static
    {
        $this->commentText = $commentText;

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
}
