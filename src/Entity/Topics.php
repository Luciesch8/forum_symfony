<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Model\TimestampedInterface;
use App\Repository\TopicsRepository;
use App\Model\DateTimeInterface;

#[ORM\Entity(repositoryClass: TopicsRepository::class)]
class Topics implements TimestampedInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    private $content;


    /**
     * @ORM\Column(type='datetime', nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type='datetime', nullable=true)
     */
    private $updateAt;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'topics')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Column(type: 'string', length: 255)]
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreatedAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    // public function getUpdateAt(): ?\DateTimeInterface
    // {
    //     return $this->updateAt;
    // }

    // public function setUpdateAt(\DateTimeInterface $updateAt): self
    // {
    //     $this->updateAt = $updateAt;

    //     return $this;
    // }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
