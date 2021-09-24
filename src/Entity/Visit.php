<?php

namespace App\Entity;

use App\Repository\VisitRepository;
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
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

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

    public function id()
    {
        return $this->id;
    }

    public function date()
    {
        return $this->date;
    }

    public function duration()
    {
        return $this->duration;
    }

    public function doctor(): Doctor
    {
        return $this->doctor;
    }
}
