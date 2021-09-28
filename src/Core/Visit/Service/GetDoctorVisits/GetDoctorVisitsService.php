<?php

declare(strict_types=1);

namespace App\Core\Visit\Service\GetDoctorVisits;

use App\Core\Doctor\Repository\DoctorRepository;
use App\Core\Visit\Entity\Visit;
use App\Core\Visit\Repository\VisitRepository;

final class GetDoctorVisitsService
{
    private VisitRepository $visitRepository;
    private DoctorRepository $doctorRepository;

    public function __construct(VisitRepository $visitRepository, DoctorRepository $doctorRepository)
    {
        $this->visitRepository = $visitRepository;
        $this->doctorRepository = $doctorRepository;
    }

    /**
     * @return Visit[]
     */
    public function __invoke(string $doctorId): array
    {
        $doctor = $this->doctorRepository->find($doctorId);

        return $this->visitRepository->findBy(['doctor' => $doctor]);
    }
}
