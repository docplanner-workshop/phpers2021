<?php

declare(strict_types=1);

namespace App\Tests;

final class AddVisitTest extends E2ETestCase
{
    private int $doctorId;
    private int $baseVisitCount;

    public function testHappyPath(): void
    {
        $this->givenClient();
        $this->givenDoctorId();
        $this->givenVisitsCount();

        $this->whenAddVisit();

        $this->thenDoctorHasOneMoreVisit();
    }

    private function givenVisitsCount(): void
    {
        $this->baseVisitCount = $this->countDoctorVisits();
    }

    private function givenDoctorId(): void
    {
        $this->getDoctors();

        $this->doctorId = $this->getFirstIdFromLastResponse();
    }

    private function whenAddVisit(): void
    {
        $body = [
            'dateTime' => '2021-10-09 10:30',
            'duration' => 60,
        ];

        $this->whenCallPostRequest("/doctor/{$this->doctorId}/visit", $body);
        $this->expectResponse(202);
    }

    private function thenDoctorHasOneMoreVisit(): void
    {
        $visitCount = $this->countDoctorVisits();

        self::assertEquals($this->baseVisitCount + 1, $visitCount);
    }

    private function countDoctorVisits(): int
    {
        $this->whenCallGetRequest("/doctor/{$this->doctorId}/visit");
        $this->expectResponse();

        return $this->countResponseItems();
    }
}
