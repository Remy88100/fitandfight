<?php

namespace App\DataFixtures;

use App\Entity\Activite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ActiviteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         
    $faker = Factory::create('fr_FR');

    for ($i=0; $i <10 ; $i++) { 
        $activite= new Activite();

        $activite->setTitle($faker->words(5,true))
                
                ->setimageFile($faker->filename);
         $manager->persist($activite);
    }
        $manager->flush();
    }
}
