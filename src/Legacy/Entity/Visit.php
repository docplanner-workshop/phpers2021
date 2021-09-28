<?php

declare(strict_types=1);

namespace App\Legacy\Entity;

use App\Legacy\Repository\VisitRepository;
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
     * @ORM\ManyToOne(targetEntity="Doctor")
     * @ORM\JoinColumn(name="doctor_id", referencedColumnName="id")
     */
    private Doctor $doctor;

    public function __construct(\DateTimeImmutable $date, int $duration, Doctor $doctor)
    {
        $this->date = $date;
        $this->duration = $duration;
        $this->doctor = $doctor;
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
