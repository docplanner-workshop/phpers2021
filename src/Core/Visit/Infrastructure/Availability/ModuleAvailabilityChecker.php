<?php

declare(strict_types=1);

namespace App\Core\Visit\Infrastructure\Availability;

use App\Core\Availability\Infrastructure\Entry\ModuleApi\CheckAvailability;
use App\Core\Visit\Domain\AvailabilityChecker;

final class ModuleAvailabilityChecker implements AvailabilityChecker
{
    private CheckAvailability $checkAvailability;

    public function __construct(CheckAvailability $checkAvailability)
    {
        $this->checkAvailability = $checkAvailability;
    }

    public function isAvailable(string $doctorId, \DateTimeImmutable $date, int $range): bool
    {
        return $this->checkAvailability->checkAvailability(
            $doctorId,
            $date->format('c'),
            $range
        );
    }
}
