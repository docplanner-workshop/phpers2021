<?php

declare(strict_types=1);

namespace App\Core\Availability\Infrastructure\Entry\Subscriber;

use App\Core\Availability\ChangeAvailability\ChangeAvailAbilityInput;
use App\Core\Availability\ChangeAvailability\ChangeAvailabilityService;
use App\Core\Visit\Domain\VisitAdded;

final class AddVisitSubscriber
{
    private ChangeAvailabilityService $service;

    public function __construct(ChangeAvailabilityService $service)
    {
        $this->service = $service;
    }

    public function __invoke(VisitAdded $visitAdded): void
    {
        ($this->service)(new ChangeAvailAbilityInput());
    }
}
