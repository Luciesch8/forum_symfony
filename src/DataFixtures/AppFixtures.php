<?php

namespace App\DataFixtures;


use Faker;
use App\Entity\User;
use App\Entity\Topics;
use App\Repository\UserRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }


    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $generator = Faker\Factory::create('fr_FR');

        for ($i=0; $i < 20 ; $i++) { 

            $user = new User();

            $password = $this->passwordHasher->hashPassword($user, 'password');



            $user
                ->setFirsname($generator->firstName())
                ->setLastname($generator->lastName())
                ->setEmail($generator->email())
                ->setPassword($password);

            $manager->persist($user);


            for ($j=0; $j< rand(10,50); $j++) { 
                 
                $topics = new Topics();

                $topics
                ->setTitle($generator->sentence())
                ->setContent($generator->text())
                ->setCreatedAt(
                    $generator->dateTime()
                )
                ->setCreatedAt(
                    $generator->dateTime()
                )
                ->setStatus(
                    $generator->randomElement(['DRAFT', 'PUBLISH', 'DELETE'])
                )
                ->setUser($user);

                $manager->persist($topics);


            }
        }

        $manager->flush();
    }
}
