<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Trello;
use App\Entity\Liste;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use DateTimeImmutable;

class ListeFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $trello = $manager->getRepository(Trello::class)->findAll();
        for ($i = 0; $i < 10; $i++) {
            $liste = new Liste();
            $liste->setName($faker->sentence());
            $liste->setCreatedAt(new DateTimeImmutable($faker->dateTime->format('Y-m-d H:i:s')));
            $liste->setUpdatedAt(new DateTimeImmutable($faker->dateTime->format('Y-m-d H:i:s')));
            $liste->setTrello($faker->randomElement($trello));
            $manager->persist($liste);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TrelloFixture::class,
        ];
    }
}
