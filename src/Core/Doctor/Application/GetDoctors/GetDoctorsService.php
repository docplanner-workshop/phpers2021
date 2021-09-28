<?php

declare(strict_types=1);

namespace App\Core\Doctor\Application\GetDoctors;

use App\Core\Doctor\Domain\Doctor;
use App\Core\Doctor\Domain\DoctorRepository;

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
