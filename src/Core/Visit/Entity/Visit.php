<?php

declare(strict_types=1);

namespace App\Core\Visit\Entity;

use App\Core\Visit\Repository\VisitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisitRepository::class)
 */
class Visit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $date;

    /**
     * @ORM\Column(type="integer")
     */
    private int $duration;

    /**
     * @ORM\Column(type="integer")
     */
    private int $doctor;

    public function __construct(\DateTimeImmutable $date, int $duration, int $doctorId)
    {
        $this->date = $date;
        $this->duration = $duration;
        $this->doctor = $doctorId;
    }

    public function id(): int
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

    public function doctor(): Doctor
    {
        return $this->doctor;
    }
}
