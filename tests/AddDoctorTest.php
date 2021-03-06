<?php

declare(strict_types=1);

namespace App\Tests;

use function PHPUnit\Framework\assertEquals;

final class AddDoctorTest extends E2ETestCase
{
    private int $doctorCount;

    public function testHappyPath(): void
    {
        $this->givenClient();
        $this->givenDoctorCount();

        $this->whenAddDoctor();

        $this->thenIsOneMoreDoctor();
    }

    private function givenDoctorCount(): void
    {
        $this->getDoctors();
        $this->doctorCount = $this->countResponseItems();
    }

    private function thenIsOneMoreDoctor(): void
    {
        $this->getDoctors();
        $currentDoctorsCount = $this->countResponseItems();
        assertEquals($this->doctorCount + 1, $currentDoctorsCount);
    }

    private function whenAddDoctor(): void
    {
        $this->whenCallPostRequest('/doctor', [
            'name' => 'Adam Nowak ' . \rand(),
        ]);
        $this->expectResponse(202);
    }
}
