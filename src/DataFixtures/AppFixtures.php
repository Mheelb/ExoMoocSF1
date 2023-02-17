<?php

namespace App\DataFixtures;

use App\Entity\Prestation;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $prestation = new Prestation();
            $prestation->setNom($faker->jobTitle);
            $prestation->setExtrait($faker->catchPhrase);
            $prestation->setDescription($faker->realTextBetween($minNbChars = 100, $maxNbChars = 300, $indexSize = 2));
            $prestation->setRemuneration(rand(10, 500));
            $prestation->setDateDeCreation($faker->date);
            $prestation->setNumero($faker->phoneNumber);
            $manager->persist($prestation);
        }

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setPassword("123");
            $user->setNom($faker->lastName);
            $user->setPrenom($faker->firstName);
            $user->setDateInscription($faker->date);
            $manager->persist($user);
        }

        $user->setEmail("user@gmail.com");
        $user->setPassword("123");
        $user->setNom("Houillon");
        $user->setPrenom("Mattéo");
        $user->setDateInscription("17-02-2023");
        $manager->persist($user);

        $manager->flush();
    }
}
