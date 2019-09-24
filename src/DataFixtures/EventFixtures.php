<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class EventFixtures extends Fixture
{

    public function load(ObjectManager $manager)

    {

    $faker = Factory::create('fr_FR');

    for ($i=0; $i <10 ; $i++) { 
        $event = new event();

        $event->setTitle($faker->words(5,true))
              ->setDescription ($faker->text(300))
              ->setDate($faker->dateTimeAD($max = 'now', $timezone = 'Europe/Paris'));


        $manager->persist($event);
    }
        $manager->flush();
    }
}
