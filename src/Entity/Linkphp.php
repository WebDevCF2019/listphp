<?php

namespace App\Entity;

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

}
