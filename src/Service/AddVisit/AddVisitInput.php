<?php
declare(strict_types=1);


namespace App\Service\AddVisit;


use App\Entity\Doctor;

final class AddVisitInput
{
    private string $doctorId;

    private \DateTimeImmutable $date;

    private int $duration;
    public function __construct(string $doctorId, \DateTimeImmutable $date, int $duration)
    {
        $this->doctorId = $doctorId;
        $this->date = $date;
        $this->duration = $duration;
    }

    public function doctorId(): string
    {
        return $this->doctorId;
    }

    public function date(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function duration(): int
    {
        return $this->duration;
    }

}
