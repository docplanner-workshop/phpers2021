<?php
declare(strict_types=1);
namespace App\Tests;

final class E2ETest extends E2ETestCase
{
    public function test()
    {

        $this->givenClient();
        $this->whenCallGetRequest('/doctor');
        $this->expectResponse();

        $body = $this->getBody();
        $doctorId = $body[0]['id'];

        $this->whenCallGetRequest("/doctor/$doctorId/visit");
        $this->expectResponse();
    }
}
