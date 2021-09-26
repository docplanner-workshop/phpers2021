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
    protected function whenCallPostRequest(string $uri, array $body): void
    {
        $this->client->request(
            'POST',
            $uri,
            $body,
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode($body)
        );
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

    protected function lastResponseBody(): array
    {
        return json_decode($this->client->getResponse()->getContent(), true);
    }

    protected function getFirstIdFromLastResponse(): int
    {
        $body = $this->lastResponseBody();
        return $body[0]['id'];
    }

    protected function countResponseItems(): int
    {
        $body = $this->lastResponseBody();
        return count($body);
    }

    protected function getDoctors(): void
    {
        $this->whenCallGetRequest('/doctor');
        $this->expectResponse();
    }

}
