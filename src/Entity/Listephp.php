<?php

namespace 'App\Entity';

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
    }

}
