<?php

declare(strict_types=1);

namespace App\Core\Visit\Application\AddVisit;

use App\Core\Visit\Domain\AvailabilityChecker;
use App\Core\Visit\Domain\Visit;
use App\Core\Visit\Domain\VisitAdded;
use App\Shared\MessageBus\EventDispatcher;
use Doctrine\ORM\EntityManagerInterface;

final class AddVisitService
{
    private EntityManagerInterface $manager;
    private AvailabilityChecker $availabilityChecker;
    private EventDispatcher $eventDispatcher;

    public function __construct(EntityManagerInterface $manager, AvailabilityChecker $availabilityChecker, EventDispatcher $eventDispatcher)
    {
        $this->manager = $manager;
        $this->availabilityChecker = $availabilityChecker;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function __invoke(AddVisitInput $input): void
    {
        if (!$this->availabilityChecker->isAvailable(
            $input->doctorId(),
            $input->date(),
            $input->duration()
        )) {
            throw new \RuntimeException('Doctor unavailable cannot add a visit');
        }

        $visit = new Visit(
            $input->date(),
            $input->duration(),
            $input->doctorId()
        );

        $this->manager->persist($visit);
        $this->manager->flush();

        $this->eventDispatcher->dispatch(
            new VisitAdded(
                $input->doctorId(),
                $input->date(),
                $input->duration()
            )
        );
    }
}
