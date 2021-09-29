<?php

declare(strict_types=1);

namespace App\Core\Visit\Domain;

use App\Shared\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Visit
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="guid")
     */
    private string $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $date;

    /**
     * @ORM\Column(type="integer")
     */
    private int $duration;

    /**
     * @ORM\Column(type="string")
     */
    private string $doctor;

    public function __construct(\DateTimeImmutable $date, int $duration, string $doctorId)
    {
        $this->id = (string) Uuid::uuid4();
        $this->date = $date;
        $this->duration = $duration;
        $this->doctor = $doctorId;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function date(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function duration(): int
    {
        return $this->duration;
    }

    public function doctor(): string
    {
        return $this->doctor;
    }
}
