<?php

declare(strict_types=1);

namespace App\Core\Doctor\Domain;

interface DoctorRepository
{
    /** @return Doctor[] */
    public function findAll(): array;
}
