<?php

declare(strict_types=1);

namespace App\Service\AddDoctor;

use App\Entity\Doctor;
use Doctrine\ORM\EntityManagerInterface;

final class AddDoctorService
{
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function __invoke(AddDoctorInput $input): void
    {
        $doctor = new Doctor($input->name());
        $this->manager->persist($doctor);
        $this->manager->flush();
    }
}
