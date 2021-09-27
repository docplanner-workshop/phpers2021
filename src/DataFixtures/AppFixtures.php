<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Doctor;
use App\Entity\Visit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $entities = [];

        $entities[] = $doctor1 = (new Doctor('Jan Kowalski'));
        $entities[] = $doctor2 = (new Doctor('Jon Doe'));

        $entities[] = (new Visit(
            new \DateTimeImmutable('2021-10-10 16:20:00'),
            45,
            $doctor1
        ));

        $entities[] = (new Visit(
            new \DateTimeImmutable('2021-10-11 08:00:00'),
            30,
            $doctor1
        ));

        $entities[] = (new Visit(
            new \DateTimeImmutable('2021-10-15 10:30:00'),
            60,
            $doctor2
        ));

        foreach ($entities as $entity) {
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
