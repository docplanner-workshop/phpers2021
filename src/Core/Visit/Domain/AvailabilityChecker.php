<?php

declare(strict_types=1);

namespace App\Core\Visit\Domain;

interface AvailabilityChecker
{
    public function isAvailable(string $doctorId, \DateTimeImmutable $date, int $range): bool;
}
