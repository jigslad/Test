<?php

namespace App\Entity;

use App\Form\LocationsType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tblpersons
 *
 * @ORM\Table(name="tblpersons", indexes={@ORM\Index(name="fk_tblpersons_1_idx", columns={"CountryID"})})
 * @ORM\Entity
 */
class Persons
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FirstName", type="string", length=50, nullable=true)
     */
    private $firstname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LastName", type="string", length=50, nullable=true)
     */
    private $lastname;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dob", type="date", nullable=true)
     */
    private $dob;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Gender", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $gender;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Organization", type="string", length=50, nullable=true)
     */
    private $organization;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Designation", type="string", length=50, nullable=true)
     */
    private $designation;

    /**
     * @var \Locations
     *
     * @ORM\ManyToOne(targetEntity="Locations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CountryID", referencedColumnName="ID")
     * })
     */
    private $countryid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="State", type="string", length=50, nullable=true)
     */
    private $state;

    /**
     * @var string|null
     *
     * @ORM\Column(name="City", type="string", length=50, nullable=true)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ZipCode", type="string", length=50, nullable=true)
     */
    private $zipcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo_name", type="string", length=50, nullable=true)
     */
    private $photoName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo_content", type="blob", length=0, nullable=true)
     */
    private $photoContent;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_self_emp", type="boolean", nullable=true)
     */
    private $isSelfEmp;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="doj", type="date", nullable=true)
     */
    private $doj;


    public function getId(): ?string
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDob(): ?\DateTimeInterface
    {
        return $this->dob;
    }

    public function setDob(?\DateTimeInterface $dob): self
    {
        $this->dob = $dob;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    public function setOrganization(?string $organization): self
    {
        $this->organization = $organization;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getCountryid(): ?Locations
    {
        return $this->countryid;
    }

    public function setCountryid(?Locations $countryid): self
    {
        $this->countryid = $countryid;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

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

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(?string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getPhotoName(): ?string
    {
        return $this->photoName;
    }

    public function setPhotoName(?string $photoName): self
    {
        $this->photoName = $photoName;

        return $this;
    }

    public function getPhotoContent()
    {
        return $this->photoContent;
    }

    public function setPhotoContent($photoContent): self
    {
        $this->photoContent = $photoContent;

        return $this;
    }

    public function getIsSelfEmp(): ?bool
    {
        return $this->isSelfEmp;
    }

    public function setIsSelfEmp(?bool $isSelfEmp): self
    {
        $this->isSelfEmp = $isSelfEmp;

        return $this;
    }

    public function getDoj(): ?\DateTimeInterface
    {
        return $this->doj;
    }

    public function setDoj(?\DateTimeInterface $doj): self
    {
        $this->doj = $doj;

        return $this;
    }


    public function __toString()
    {
        return $this->getFirstname();
    }
    public function getContacts(){
        return true;
    }
    public function setContacts($contacts): self
    {
        return $this;
    }


}
