<?php

declare(strict_types=1);

namespace App\Core\Availability\Application\GetAvailability;

final class CheckAvailabilityService
{
    public function __invoke(CheckAvailabilityInput $input): bool
    {
        return true;
    }
}
