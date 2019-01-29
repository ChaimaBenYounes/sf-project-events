<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Event as EventC; 

class Event extends Fixture
{
    private $faker;

    public function load(ObjectManager $em)
    {
        $this->faker = Factory::create();

        $this->addFaker($em);

        $em->flush();
    }

    private function addFaker(ObjectManager $em){
        
        for ($i=1; $i < 30; $i++) {

            $event = new EventC();
            $event->setName($this->faker->name);
            $event->setPric($this->faker->randomFloat(5, 0, 1));
            $event->setDate($this->faker->dateTime('now', null));
            $event->setDescription($this->faker->paragraph(3,true));
            $event->setLocalisation($this->faker->state);

            $em->persist($event);
    
        }
    }
}
