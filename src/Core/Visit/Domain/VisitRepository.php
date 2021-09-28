<?php

declare(strict_types=1);

namespace App\Core\Visit\Domain;

interface VisitRepository
{
    /**
     * @param mixed[] $array
     *
     * @return Visit[]
     */
    public function findBy(array $array): array;
}
