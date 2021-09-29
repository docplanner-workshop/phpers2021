<?php

declare(strict_types=1);

namespace App\Core\Visit\Application\AddVisit;

use App\Core\Visit\Domain\Visit;
use Doctrine\ORM\EntityManagerInterface;

final class AddVisitService
{
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function __invoke(AddVisitInput $input): void
    {
        $visit = new Visit(
            $input->date(),
            $input->duration(),
            $input->doctorId()
        );

        $this->manager->persist($visit);
        $this->manager->flush();
    }
}
