<?php

declare(strict_types=1);

namespace App\Legacy\Service\GetDoctorVisits;

use App\Legacy\Entity\Visit;
use App\Legacy\Repository\DoctorRepository;
use App\Legacy\Repository\VisitRepository;

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
