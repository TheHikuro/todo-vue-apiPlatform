<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Trello;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use DateTimeImmutable;

class TrelloFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $users = $manager->getRepository(User::class)->findAll();
        for ($i = 0; $i < 10; $i++) {
            $trello = new Trello();
            $trello->setName($faker->sentence());
            $trello->setCreatedAt(new DateTimeImmutable($faker->dateTime->format('Y-m-d H:i:s')));
            $trello->setUpdatedAt(new DateTimeImmutable($faker->dateTime->format('Y-m-d H:i:s')));
            $trello->addUser($faker->randomElement($users));
            $manager->persist($trello);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixture::class,
        ];
    }
}
