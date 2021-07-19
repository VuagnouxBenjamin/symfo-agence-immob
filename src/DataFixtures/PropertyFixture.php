<?php

namespace App\DataFixtures;

use App\Entity\Properties;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        // looping 100 times
        for ($i = 0; $i < 100; $i++ ) {
            // initialising new instance
             $property = new Properties();

            // setting values for each instance
            $property->setTitle($faker->words(3, true))
                ->setDescription($faker->sentences(3, true))
                ->setSurface($faker->numberBetween(20, 200))
                ->setRooms($faker->numberBetween(1,8))
                ->setBedrooms($faker->numberBetween(1,6))
                ->setFloor($faker->numberBetween(1,6))
                ->setPrice($faker->numberBetween(80000, 500000))
                ->setHeat($faker->numberBetween(1,3))
                ->setCity($faker->words(1, true))
                ->setAdress($faker->words(4, true))
                ->setPostalCode($faker->numberBetween(10000, 95000));

            // sending data to db via manager
             $manager->persist($property);
             $manager->flush();
        }

    }
}
