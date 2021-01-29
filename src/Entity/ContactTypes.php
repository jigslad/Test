<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactTypes
 *
 * @ORM\Table(name="tblContacttypes")
 * @ORM\Entity
 */
class ContactTypes
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Contacttype", type="string", length=50, nullable=true)
     */
    private $contacttype;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContacttype(): ?string
    {
        return $this->contacttype;
    }

    public function setContacttype(?string $contacttype): self
    {
        $this->contacttype = $contacttype;

        return $this;
    }

    public function __toString()
    {
        return $this->contacttype;
    }


}
