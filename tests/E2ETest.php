<?php
declare(strict_types=1);
namespace App\Tests;

final class E2ETest extends E2ETestCase
{
    public function test() {

        $this->givenClient();

        $this->whenCallGetRequest('/doctors');

        $this->expectResponse();
        $this->expectResponseBody('[{"id":1,"name":"Jan Kowalski"},{"id":2,"name":"Jon Doe"}]');
    }
}
