<?php

declare(strict_types=1);

namespace App\Core\Availability\Application\GetAvailability;

final class CheckAvailabilityInput
{
    private string $doctorId;
    private \DateTimeImmutable $date;
    private int $range;

    public function __construct(string $doctorId, \DateTimeImmutable $date, int $range)
    {
        $this->doctorId = $doctorId;
        $this->date = $date;
        $this->range = $range;
    }

    public function doctorId(): string
    {
        return $this->doctorId;
    }

    public function date(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function range(): int
    {
        return $this->range;
    }
}
