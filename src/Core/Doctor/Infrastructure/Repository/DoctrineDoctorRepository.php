<?php

declare(strict_types=1);

namespace App\Core\Doctor\Infrastructure\Repository;

use App\Core\Doctor\Domain\Doctor;
use App\Core\Doctor\Domain\DoctorRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectRepository;

class DoctrineDoctorRepository implements DoctorRepository
{
    private ObjectRepository $repository;

    public function __construct(ManagerRegistry $registry)
    {
        $this->repository = $registry->getRepository(Doctor::class);
    }

    /**
     * {@inheritDoc}
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}
