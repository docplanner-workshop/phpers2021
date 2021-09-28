<?php

declare(strict_types=1);

namespace App\Core\Visit\Service\GetDoctorVisits;

use App\Core\Visit\Entity\Visit;
use App\Core\Visit\Repository\VisitRepository;

final class GetDoctorVisitsService
{
    private VisitRepository $visitRepository;

    public function __construct(VisitRepository $visitRepository)
    {
        $this->visitRepository = $visitRepository;
    }

    /**
     * @return Visit[]
     */
    public function __invoke(string $doctorId): array
    {
        return $this->visitRepository->findBy(['doctor' => $doctorId]);
    }
}
