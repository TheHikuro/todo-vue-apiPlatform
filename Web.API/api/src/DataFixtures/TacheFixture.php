<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Liste;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use DateTimeImmutable;
use App\Entity\Tache;

class TacheFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $users = $manager->getRepository(User::class)->findAll();
        $liste = $manager->getRepository(Liste::class)->findAll();
        for ($i = 0; $i < 10; $i++) {
            $tache = new Tache();
            $tache->setName($faker->sentence());
            $tache->setCompleted($faker->boolean());
            $tache->setCreatedAt(new DateTimeImmutable($faker->dateTime->format('Y-m-d H:i:s')));
            $tache->setUpdatedAt(new DateTimeImmutable($faker->dateTime->format('Y-m-d H:i:s')));
            $tache->setAsignedTo($faker->randomElement($users));
            $tache->setListe($faker->randomElement($liste));
            $manager->persist($tache);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixture::class,
            ListeFixture::class,
        ];
    }
}
