<?php

declare(strict_types=1);

namespace App\Core\Doctor\Service\AddDoctor;

final class AddDoctorInput
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}