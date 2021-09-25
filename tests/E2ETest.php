<?php
declare(strict_types=1);
namespace App\Tests;

final class E2ETest extends E2ETestCase
{
    public function testProcess(): void
    {
        $this->givenClient();

        $this->getDoctors();
        $this->addVisit();
//        $this->getDoctorVisits();

    }

    private function getDoctors(): void
    {
        $this->whenCallGetRequest('/doctor');
        $this->expectResponse();
    }

    private function addVisit(): void
    {
        $doctorId = $this->getDoctorIdFromGetDoctorsResponse();

        $body = [
            'dateTime' => '2021-10-09 10:30',
            'duration' => 60
        ];

        $this->whenCallPostRequest("/doctor/$doctorId/visit", $body);
        $this->expectResponse(202);
    }

    private function getDoctorVisits(): void
    {
        $body = $this->lastResponseBody();
        $doctorId = $body[0]['id'];

        $this->whenCallGetRequest("/doctor/$doctorId/visit");
        $this->expectResponse();
    }
}
