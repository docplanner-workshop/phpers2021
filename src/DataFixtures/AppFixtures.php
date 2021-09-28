<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Core\Doctor\Domain\Doctor;
use App\Core\Visit\Domain\Visit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $entities = [];

        $entities[] = (new Doctor('Jan Kowalski'));
        $entities[] = (new Doctor('Jon Doe'));

        $entities[] = (new Visit(
            new \DateTimeImmutable('2021-10-10 16:20:00'),
            45,
            1
        ));

        $entities[] = (new Visit(
            new \DateTimeImmutable('2021-10-11 08:00:00'),
            30,
            1
        ));

        $entities[] = (new Visit(
            new \DateTimeImmutable('2021-10-15 10:30:00'),
            60,
            2
        ));

        foreach ($entities as $entity) {
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
