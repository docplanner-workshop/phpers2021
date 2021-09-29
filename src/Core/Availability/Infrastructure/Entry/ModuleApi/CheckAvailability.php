<?php

declare(strict_types=1);

namespace App\Core\Availability\Infrastructure\Entry\ModuleApi;

use App\Core\Availability\Application\GetAvailability\CheckAvailabilityInput;
use App\Core\Availability\Application\GetAvailability\CheckAvailabilityService;

final class CheckAvailability
{
    private CheckAvailabilityService $checkAvailabilityService;

    public function __construct(CheckAvailabilityService $checkAvailabilityService)
    {
        $this->checkAvailabilityService = $checkAvailabilityService;
    }

    public function checkAvailability(string $doctorId, string $date, int $range): bool
    {
        return ($this->checkAvailabilityService)(
            new CheckAvailabilityInput(
                $doctorId,
                new \DateTimeImmutable($date),
                $range
            )
        );
    }
}
