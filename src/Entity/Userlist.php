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

    public function getIduserlist(): ?int
    {
        return $this->iduserlist;
    }

    public function getThelogin(): ?string
    {
        return $this->thelogin;
    }

    public function setThelogin(string $thelogin): self
    {
        $this->thelogin = $thelogin;

        return $this;
    }

    public function getThepwd(): ?string
    {
        return $this->thepwd;
    }

    public function setThepwd(string $thepwd): self
    {
        $this->thepwd = $thepwd;

        return $this;
    }

    public function getThename(): ?string
    {
        return $this->thename;
    }

    public function setThename(string $thename): self
    {
        $this->thename = $thename;

        return $this;
    }

    public function getThemail(): ?string
    {
        return $this->themail;
    }

    public function setThemail(string $themail): self
    {
        $this->themail = $themail;

        return $this;
    }

    public function __toString()
    {
        return $this->getThelogin();
    }


}
