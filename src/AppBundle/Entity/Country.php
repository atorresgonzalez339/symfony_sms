<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * @ORM\Entity()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountryRepository")
 * @ORM\Table(name="countries")
 */
class Country {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=80)
     * @var string
     */
    private $nice_name;

    /**
     * @ORM\Column(type="string", length=2)
     * @var string
     */
    private $iso;

    /**
     * @ORM\Column(type="string", length=3)
     * @var string
     */
    private $iso3;

    /**
     * @ORM\Column(type="integer", length=6)
     * @var string
     */
    private $num_code;

    /**
     * @ORM\Column(type="integer", length=6)
     * @var string
     */
    private $phone_code;
}
