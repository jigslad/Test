<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblcontacts
 *
 * @ORM\Table(name="tblContacts", indexes={@ORM\Index(name="fk_tblContacts_1_idx", columns={"ContactTypeID"})})
 * @ORM\Entity
 */
class Contacts
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="PersonID", type="bigint", nullable=true)
     */
    private $personid;

    /**
     * @var bool
     *
     * @ORM\Column(name="SerialNumber", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $serialnumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Detail", type="string", length=100, nullable=true)
     */
    private $detail;

    /**
     * @var \Tblcontacttypes
     *
     * @ORM\ManyToOne(targetEntity="ContactTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ContactTypeID", referencedColumnName="ID")
     * })
     */
    private $contacttypeid;

    public function getPersonid(): ?string
    {
        return $this->personid;
    }

    public function setPersonid(?string $personid): self
    {
        $this->personid = $personid;

        return $this;
    }

    public function getSerialnumber(): ?bool
    {
        return $this->serialnumber;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(?string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getContacttypeid(): ?Tblcontacttypes
    {
        return $this->contacttypeid;
    }

    public function setContacttypeid(?Tblcontacttypes $contacttypeid): self
    {
        $this->contacttypeid = $contacttypeid;

        return $this;
    }


}
