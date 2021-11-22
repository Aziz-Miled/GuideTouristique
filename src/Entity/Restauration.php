<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use App\Repository\RestaurationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;
use Symfony\Component\Validator\Constraints as AppAssert;

/**
 * @ORM\Entity(repositoryClass=RestaurationRepository::class)
 */
class Restauration
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     *
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     *
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     *
     * @Assert\Length(
     * min = 8,
     * max = 8,
     * minMessage = "Votre tel doit contenir au moins {{limit }} chifres",
     * maxMessage = "Votre tel doit contenir au plus {{limit }} chifres",
     * allowEmptyString = false
     * )
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     *
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     */
    private $page_web;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\File(mimeTypes={ "image/jpeg" , "image/png","image/jpg","image/GIF" })
     * @Assert\NotBlank(message="Champ ne doit pas être vide!")
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity=Menu::class, mappedBy="restauration", cascade={"persist", "remove"})
     */
    private $menu;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(?int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPageWeb(): ?string
    {
        return $this->page_web;
    }

    public function setPageWeb(string $page_web): self
    {
        $this->page_web = $page_web;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        // unset the owning side of the relation if necessary
        if ($menu === null && $this->menu !== null) {
            $this->menu->setRestauration(null);
        }

        // set the owning side of the relation if necessary
        if ($menu !== null && $menu->getRestauration() !== $this) {
            $menu->setRestauration($this);
        }

        $this->menu = $menu;

        return $this;
    }

}
