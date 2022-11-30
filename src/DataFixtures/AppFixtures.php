<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Group;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;



class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        

        $listGroup = [];
        $now = new \DateTime('now' , new \DateTimeZone('Europe/Berlin') );

        for ($i = 0; $i < 10; $i++) {
        $group = new Group();
        $group->setName("Groupe " . $i);
        $group->setCreatedAt($now);
        $group->setUpdatedAt($now);
        
        
        $manager->persist($group);
    }
        for ($i = 0; $i < 20; $i++) {
        // Création de l'utilisateur lui-même.
        $user = new User();
        $user->setFirstName("Prénom " . $i);
        $user->setLastName("Nom " . $i);
        $user->setPassword("test" . $i);
        $user->setEmail("test.$i@test.fr ");
        $user->setCreatedAt($now);
        $user->setUpdatedAt($now);
        $user->setGroupes($group);

        $manager->persist($user);

        // $listUser[] = $user;
    }

        
        $manager->flush();
    }
}
