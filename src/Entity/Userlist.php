<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userlist
 *
 * @ORM\Table(name="userlist", uniqueConstraints={@ORM\UniqueConstraint(name="thelogin_UNIQUE", columns={"thelogin"})})
 * @ORM\Entity
 */
class Userlist
{
    /**
     * @var int
     *
     * @ORM\Column(name="iduserlist", type="smallint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduserlist;

    /**
     * @var string
     *
     * @ORM\Column(name="thelogin", type="string", length=60, nullable=false)
     */
    private $thelogin;

    /**
     * @var string
     *
     * @ORM\Column(name="thepwd", type="string", length=64, nullable=false, options={"fixed"=true})
     */
    private $thepwd;

    /**
     * @var string
     *
     * @ORM\Column(name="thename", type="string", length=120, nullable=false)
     */
    private $thename;

    /**
     * @var string
     *
     * @ORM\Column(name="themail", type="string", length=160, nullable=false)
     */
    private $themail;


}
