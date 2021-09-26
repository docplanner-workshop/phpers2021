<?php
declare(strict_types=1);

namespace App\Service\GetDoctorVisits;

use App\Entity\Doctor;
use App\Entity\Visit;
use App\Repository\DoctorRepository;
use App\Repository\VisitRepository;

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
