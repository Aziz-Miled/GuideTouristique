<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;
use Symfony\Component\Validator\Constraints as AppAssert;
/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\ManyToMany(targetEntity=Plat::class)
     */
    private $plat;

    /**
     * @ORM\ManyToMany(targetEntity=Boissons::class)
     */
    private $boissons;

    /**
     * @ORM\ManyToMany(targetEntity=Cafe::class)
     */
    private $cafe;

    /**
     * @ORM\OneToOne(targetEntity=Restauration::class, inversedBy="menu", cascade={"persist", "remove"})
     */
    private $restauration;
    public function getId(): ?int
    {
        return $this->id;
    }
    public function __construct()
    {
        $this->plat = new ArrayCollection();
        $this->boissons = new ArrayCollection();
        $this->cafe = new ArrayCollection();
    }

    /**
     * @return Collection|Plat[]
     */
    public function getPlat(): Collection
    {
        return $this->plat;
    }

    public function addPlat(Plat $plat): self
    {
        if (!$this->plat->contains($plat)) {
            $this->plat[] = $plat;
        }

        return $this;
    }

    public function removePlat(Plat $plat): self
    {
        $this->plat->removeElement($plat);

        return $this;
    }

    /**
     * @return Collection|Boissons[]
     */
    public function getBoissons(): Collection
    {
        return $this->boissons;
    }

    public function addBoisson(Boissons $boisson): self
    {
        if (!$this->boissons->contains($boisson)) {
            $this->boissons[] = $boisson;
        }

        return $this;
    }

    public function removeBoisson(Boissons $boisson): self
    {
        $this->boissons->removeElement($boisson);

        return $this;
    }

    /**
     * @return Collection|Cafe[]
     */
    public function getCafe(): Collection
    {
        return $this->cafe;
    }

    public function addCafe(Cafe $cafe): self
    {
        if (!$this->cafe->contains($cafe)) {
            $this->cafe[] = $cafe;
        }

        return $this;
    }

    public function removeCafe(Cafe $cafe): self
    {
        $this->cafe->removeElement($cafe);

        return $this;
    }

    public function getRestauration(): ?Restauration
    {
        return $this->restauration;
    }

    public function setRestauration(?Restauration $restauration): self
    {
        $this->restauration = $restauration;

        return $this;
    }








}
