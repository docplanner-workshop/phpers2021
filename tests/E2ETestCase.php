<?php
declare(strict_types=1);
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class E2ETestCase extends WebTestCase
{
    protected KernelBrowser $client;

    protected function givenClient(): void
    {
        $this->client = self::createClient();
    }

    protected function whenCallGetRequest(string $uri): void
    {
        $this->client->request('GET', $uri);
    }

    protected function expectResponse(int $code = 200): void
    {
        self::assertResponseStatusCodeSame($code);
    }

    protected function expectResponseBody($body)
    {
        $content = $this->client->getResponse()->getContent();

        self::assertEquals($content, $body);
    }
}
