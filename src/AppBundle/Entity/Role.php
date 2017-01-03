<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * @ORM\Entity()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoleRepository")
 * @ORM\Table(name="roles")
 */
class Role implements RoleInterface {

    const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=30)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="role", type="string", length=30, unique=true)
     */
    private $role;


    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="roles", cascade={"persist"})
     */
    private $users;

    public function __construct() {
        $this->users = new ArrayCollection();
    }

    /**
     * @see RoleInterface
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Role
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Role
     */
    public function setRole($role) {
        $this->role = $role;

        return $this;
    }

    /**
     * Add users
     *
     * @param User $users
     * @return Role
     */
    public function addUser(User $users) {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param User $users
     */
    public function removeUser(User $users) {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return Collection 
     */
    public function getUsers() {
        return $this->users;
    }

    function __toString()
    {
        return $this->name;
    }


}
