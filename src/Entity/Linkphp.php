<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Linkphp
 *
 * @ORM\Table(name="linkphp")
 * @ORM\Entity
 */
class Linkphp
{
    /**
     * @var int
     *
     * @ORM\Column(name="idlinkphp", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlinkphp;

    /**
     * @var string
     *
     * @ORM\Column(name="thetitle", type="string", length=150, nullable=false)
     */
    private $thetitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thedesc", type="string", length=500, nullable=true)
     */
    private $thedesc;

    /**
     * @var string
     *
     * @ORM\Column(name="theurl", type="string", length=500, nullable=false)
     */
    private $theurl;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Listephp", mappedBy="linkphplinkphp")
     */
    private $listephplistephp;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listephplistephp = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdlinkphp(): ?int
    {
        return $this->idlinkphp;
    }

    public function getThetitle(): ?string
    {
        return $this->thetitle;
    }

    public function setThetitle(string $thetitle): self
    {
        $this->thetitle = $thetitle;

        return $this;
    }

    public function getThedesc(): ?string
    {
        return $this->thedesc;
    }

    public function setThedesc(?string $thedesc): self
    {
        $this->thedesc = $thedesc;

        return $this;
    }

    public function getTheurl(): ?string
    {
        return $this->theurl;
    }

    public function setTheurl(string $theurl): self
    {
        $this->theurl = $theurl;

        return $this;
    }

    /**
     * @return Collection|Listephp[]
     */
    public function getListephplistephp(): Collection
    {
        return $this->listephplistephp;
    }

    public function addListephplistephp(Listephp $listephplistephp): self
    {
        if (!$this->listephplistephp->contains($listephplistephp)) {
            $this->listephplistephp[] = $listephplistephp;
            $listephplistephp->addLinkphplinkphp($this);
        }

        return $this;
    }

    public function removeListephplistephp(Listephp $listephplistephp): self
    {
        if ($this->listephplistephp->contains($listephplistephp)) {
            $this->listephplistephp->removeElement($listephplistephp);
            $listephplistephp->removeLinkphplinkphp($this);
        }

        return $this;
    }

}
