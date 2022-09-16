<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Tache;
use App\Entity\Comment;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use DateTimeImmutable;

class CommentFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $users = $manager->getRepository(User::class)->findAll();
        $tache = $manager->getRepository(Tache::class)->findAll();
        for ($i = 0; $i < 10; $i++) {
            $comment = new Comment();
            $comment->setMessage($faker->sentence());
            $comment->setCreatedAt(new DateTimeImmutable($faker->dateTime->format('Y-m-d H:i:s')));
            $comment->setUpdatedAt(new DateTimeImmutable($faker->dateTime->format('Y-m-d H:i:s')));
            $comment->setSender($faker->randomElement($users));
            $comment->setTache($faker->randomElement($tache));
            $manager->persist($comment);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixture::class,
            TacheFixture::class,
        ];
    }
}
