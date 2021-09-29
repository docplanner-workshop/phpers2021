<?php

declare(strict_types=1);

namespace App\Core\Availability\Domain;

final class Slot
{
    private \DateTimeImmutable $startDate;

    private \DateTimeImmutable $endDate;

    public function __construct(\DateTimeImmutable $startDate, \DateTimeImmutable $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function startDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeImmutable $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function endDate(): \DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeImmutable $endDate): void
    {
        $this->endDate = $endDate;
    }
}
