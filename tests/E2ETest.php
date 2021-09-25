<?php
declare(strict_types=1);
namespace App\Tests;

final class E2ETest extends E2ETestCase
{
    public function testProcess(): void
    {
        $this->givenClient();
        $this->getDoctors();

        $doctorId = $this->getFirstIdFromLastResponse();

        $visitsCount = $this->countDoctorVisits($doctorId);
        $this->addVisit($doctorId);

        $this->thenDoctorHasOneMoreVisit($doctorId, $visitsCount + 1);

    }

    private function getDoctors(): void
    {
        $this->whenCallGetRequest('/doctor');
        $this->expectResponse();
    }

    private function addVisit(int $doctorId): void
    {
        $body = [
            'dateTime' => '2021-10-09 10:30',
            'duration' => 60
        ];

        $this->whenCallPostRequest("/doctor/{$doctorId}/visit", $body);
        $this->expectResponse(202);
    }

    private function countDoctorVisits(int $doctorId): int
    {
        $this->whenCallGetRequest("/doctor/$doctorId/visit");
        $this->expectResponse();
        return $this->countResponseItems();

    }

    private function thenDoctorHasOneMoreVisit(int $doctorId, int $expectedCount)
    {
        $visitCount = $this->countDoctorVisits($doctorId);

        $this->assertEquals($expectedCount, $visitCount);
    }
}
