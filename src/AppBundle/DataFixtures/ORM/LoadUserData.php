<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadUserData implements FixtureInterface, ORMFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user2 = new User();
        $user3 = new User();
        $user4 = new User();

        $user1
            ->setUsername('original@some.com')
            ->setEnabled(true)
            ->setAvatar("avatar1.jpg")
            ->setEmail('original@some.com')
            ->setPlainPassword('123321')
            ->setSuperAdmin(true)
        ;
        $manager->persist($user1);

        $user2
            ->setUsername('dima@some.com')
            ->setEnabled(true)
            ->setAvatar("avatar2.jpg")
            ->setEmail('dima@some.com')
            ->setPlainPassword('123321')
        ;
        $manager->persist($user2);

        $user3
            ->setUsername('maks@some.com')
            ->setEnabled(true)
            ->setAvatar("avatar3.jpg")
            ->setEmail('maks@some.com')
            ->setPlainPassword('123321')
        ;
        $manager->persist($user3);

        $user4
            ->setUsername('vika@some.com')
            ->setEnabled(true)
            ->setAvatar("avatar4.jpg")
            ->setEmail('vika@some.com')
            ->setPlainPassword('123321')
        ;
        $manager->persist($user4);

        $manager->flush();

    }
}