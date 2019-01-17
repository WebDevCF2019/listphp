<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Listephp
 *
 * @ORM\Table(name="listephp", uniqueConstraints={@ORM\UniqueConstraint(name="thetitle_UNIQUE", columns={"thetitle"})}, indexes={@ORM\Index(name="fk_listephp_userlist_idx", columns={"userlist_iduserlist"})})
 * @ORM\Entity
 */
class Listephp
{
    /**
     * @var int
     *
     * @ORM\Column(name="idlistephp", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlistephp;

    /**
     * @var string
     *
     * @ORM\Column(name="thetitle", type="string", length=120, nullable=false)
     */
    private $thetitle;

    /**
     * @var string
     *
     * @ORM\Column(name="thedesc", type="string", length=500, nullable=false)
     */
    private $thedesc;

    /**
     * @var string
     *
     * @ORM\Column(name="thetext", type="text", length=65535, nullable=false)
     */
    private $thetext;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="thedate", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $thedate = 'CURRENT_TIMESTAMP';

    /**
     * @var \Userlist
     *
     * @ORM\ManyToOne(targetEntity="Userlist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userlist_iduserlist", referencedColumnName="iduserlist")
     * })
     */
    private $userlistuserlist;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Linkphp", inversedBy="listephplistephp")
     * @ORM\JoinTable(name="listephp_has_linkphp",
     *   joinColumns={
     *     @ORM\JoinColumn(name="listephp_idlistephp", referencedColumnName="idlistephp")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="linkphp_idlinkphp", referencedColumnName="idlinkphp")
     *   }
     * )
     */
    private $linkphplinkphp;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->linkphplinkphp = new \Doctrine\Common\Collections\ArrayCollection();
        $this->thedate = new \DateTime("now", new \DateTimeZone('Europe/Paris'));
    }

    public function getIdlistephp(): ?int
    {
        return $this->idlistephp;
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

    public function setThedesc(string $thedesc): self
    {
        $this->thedesc = $thedesc;

        return $this;
    }

    public function getThetext(): ?string
    {
        return $this->thetext;
    }

    public function setThetext(string $thetext): self
    {
        $this->thetext = $thetext;

        return $this;
    }

    public function getThedate(): ?\DateTimeInterface
    {
        return $this->thedate;
    }

    public function setThedate(?\DateTimeInterface $thedate): self
    {
        $this->thedate = $thedate;

        return $this;
    }

    public function getUserlistuserlist(): ?Userlist
    {
        return $this->userlistuserlist;
    }

    public function setUserlistuserlist(?Userlist $userlistuserlist): self
    {
        $this->userlistuserlist = $userlistuserlist;

        return $this;
    }

    /**
     * @return Collection|Linkphp[]
     */
    public function getLinkphplinkphp(): Collection
    {
        return $this->linkphplinkphp;
    }

    public function addLinkphplinkphp(Linkphp $linkphplinkphp): self
    {
        if (!$this->linkphplinkphp->contains($linkphplinkphp)) {
            $this->linkphplinkphp[] = $linkphplinkphp;
        }

        return $this;
    }

    public function removeLinkphplinkphp(Linkphp $linkphplinkphp): self
    {
        if ($this->linkphplinkphp->contains($linkphplinkphp)) {
            $this->linkphplinkphp->removeElement($linkphplinkphp);
        }

        return $this;
    }

}
