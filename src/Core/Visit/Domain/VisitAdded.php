<?php

declare(strict_types=1);

namespace App\Core\Visit\Domain;

use App\Shared\MessageBus\Event;

final class VisitAdded implements Event
{
    private string $doctorId;

    private \DateTimeImmutable $dateTime;

    private int $duration;

    public function __construct(string $doctorId, \DateTimeImmutable $dateTime, int $duration)
    {
        $this->doctorId = $doctorId;
        $this->dateTime = $dateTime;
        $this->duration = $duration;
    }

    public function doctorId(): string
    {
        return $this->doctorId;
    }

    public function dateTime(): \DateTimeImmutable
    {
        return $this->dateTime;
    }

    public function duration(): int
    {
        return $this->duration;
    }
}
