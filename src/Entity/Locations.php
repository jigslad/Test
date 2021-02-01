<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbllocations
 *
 * @ORM\Table(name="tblLocations")
 * @ORM\Entity
 */
class Locations
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="LocationType", type="boolean", nullable=false)
     */
    private $locationtype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Description", type="string", length=200, nullable=true)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ParentID", type="integer", nullable=true)
     */
    private $parentid;

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

    public function getLocationtype(): ?bool
    {
        return $this->locationtype;
    }

    public function setLocationtype(bool $locationtype): self
    {
        $this->locationtype = $locationtype;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getParentid(): ?int
    {
        return $this->parentid;
    }

    public function setParentid(?int $parentid): self
    {
        $this->parentid = $parentid;

        return $this;
    }

    public function __toString(): ?string
    {
        return $this->getName();
    }
}
