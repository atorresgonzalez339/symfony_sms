<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Role;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use AppBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadUsers implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    private function encodePassword(User $user, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')
            ->getEncoder($user)
        ;

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstName('Angel');
        $user->setLastName('Torres');
        $user->setEmail('atorresgonzalez339@gmail.com');
        $user->setPassword($this->encodePassword($user, 'angel1234'));
        $user->setIsActive(true);

        $roleClient = $manager->getRepository('AppBundle:Role')->findOneBy(array(
            'role' => 'ROLE_CLIENT'
        ));

        $user->addRole($roleClient);

        $manager->persist($user);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}