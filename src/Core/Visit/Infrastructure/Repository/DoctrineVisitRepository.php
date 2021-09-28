<?php

declare(strict_types=1);

namespace App\Core\Visit\Infrastructure\Repository;

use App\Core\Visit\Domain\Visit;
use App\Core\Visit\Domain\VisitRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectRepository;

class DoctrineVisitRepository implements VisitRepository
{
    private ObjectRepository $repository;

    public function __construct(ManagerRegistry $registry)
    {
        $this->repository = $registry->getRepository(Visit::class);
    }

    /**
     * {@inheritDoc}
     */
    public function findBy(array $array): array
    {
        return $this->repository->findBy($array);
    }
}
