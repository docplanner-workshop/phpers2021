<?php
declare(strict_types=1);


namespace App\Service\GetDoctors;


use App\Entity\Doctor;
use App\Repository\DoctorRepository;

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
    public function getDoctors(): array
    {
        return $this->repository->findAll();
    }

}
