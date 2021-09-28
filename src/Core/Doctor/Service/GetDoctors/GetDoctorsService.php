<?php

declare(strict_types=1);

namespace App\Core\Doctor\Service\GetDoctors;

use App\Core\Doctor\Entity\Doctor;
use App\Core\Doctor\Repository\DoctorRepository;

final class GetDoctorsService
{
    private DoctorRepository $repository;

    public function __construct(DoctorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Doctor[]
     */
    public function __invoke(): array
    {
        return $this->repository->findAll();
    }
}
