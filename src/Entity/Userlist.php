<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Userlist
 *
 * @ORM\Table(name="userlist", uniqueConstraints={@ORM\UniqueConstraint(name="thelogin_UNIQUE", columns={"thelogin"})})
 * @ORM\Entity
 */
class Userlist implements UserInterface
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


    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return array('ROLE_USER');
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        // TODO: Implement getPassword() method.
        return $this->getThepwd();
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
        return $this->getThelogin();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
