<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TrelloRepository;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource]
#[GetCollection(
    normalizationContext: [
        'groups' => ['cget'],
    ],
)]
#[Get(
    normalizationContext: [
        'groups' => ['get'],
    ],
)]
#[Post(
    denormalizationContext: [
        'groups' => ['post'],
    ],
)]
#[Patch]
#[Delete]
#[ORM\Entity(repositoryClass: TrelloRepository::class)]
class Trello
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    #[Groups(['get'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['cget', 'get', 'post'])]
    private ?string $name = null;

    #[Groups(['post'])]
    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[Groups(['get'])]
    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\OneToMany(mappedBy: 'trello', targetEntity: Liste::class, orphanRemoval: true)]
    private Collection $liste;

    #[Groups(['post'])]
    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'trello')]
    private Collection $users;

    public function __construct()
    {
        $this->liste = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, Liste>
     */
    public function getListe(): Collection
    {
        return $this->liste;
    }

    public function addListe(Liste $liste): self
    {
        if (!$this->liste->contains($liste)) {
            $this->liste[] = $liste;
            $liste->setTrello($this);
        }

        return $this;
    }

    public function removeListe(Liste $liste): self
    {
        if ($this->liste->removeElement($liste)) {
            // set the owning side to null (unless already changed)
            if ($liste->getTrello() === $this) {
                $liste->setTrello(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addTrello($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeTrello($this);
        }

        return $this;
    }
}
