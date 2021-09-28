<?php

declare(strict_types=1);

namespace App\Legacy\Service\AddVisit;

use App\Legacy\Entity\Doctor;
use App\Legacy\Entity\Visit;
use App\Legacy\Repository\DoctorRepository;
use Doctrine\ORM\EntityManagerInterface;

final class AddVisitService
{
    private EntityManagerInterface $manager;
    private DoctorRepository $repository;

    public function __construct(EntityManagerInterface $manager, DoctorRepository $repository)
    {
        $this->manager = $manager;
        $this->repository = $repository;
    }

    public function __invoke(AddVisitInput $input): void
    {
        $doctor = $this->repository->find($input->doctorId());

        if (!$doctor instanceof Doctor) {
            throw new \RuntimeException('Doctor not found');
        }

        $visit = new Visit(
            $input->date(),
            $input->duration(),
            $doctor
        );

        $this->manager->persist($visit);
        $this->manager->flush();
    }
}
