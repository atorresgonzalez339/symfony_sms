<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Role;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadRoles implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $roleAdmin = new Role();
        $roleAdmin->setName('Client');
        $roleAdmin->setRole('ROLE_CLIENT');
        $manager->persist($roleAdmin);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}