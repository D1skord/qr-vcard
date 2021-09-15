<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class VCard
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $email;

    /**
     * Company name
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $org;

    /**
     * Role in company
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $streetHouseNumber;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $city;

    /**
     * Your site
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $bday;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
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

    public function getOrg(): ?string
    {
        return $this->org;
    }

    public function setOrg(string $org): self
    {
        $this->org = $org;

        return $this;
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getBday(): ?\DateTimeInterface
    {
        return $this->bday;
    }

    public function setBday(?\DateTimeInterface $bday): self
    {
        $this->bday = $bday;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(?string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getStreetHouseNumber(): ?string
    {
        return $this->streetHouseNumber;
    }

    public function setStreetHouseNumber(?string $streetHouseNumber): self
    {
        $this->streetHouseNumber = $streetHouseNumber;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

}