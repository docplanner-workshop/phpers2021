<?php

namespace App\DataFixtures;

use App\Entity\Doctor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $doctor1 = new Doctor('Jan Kowalski');
        $doctor2 = new Doctor('Jon Doe');

        $manager->persist($doctor1);
        $manager->persist($doctor2);

        $manager->flush();
    }
}
