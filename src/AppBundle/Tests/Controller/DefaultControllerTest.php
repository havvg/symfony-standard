<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIssue()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/app/issue');
        $response = $client->getResponse();

        $expected = $response->getContent();
        static::assertNotEmpty($expected);

        $crawler = $client->request('GET', '/app/issue');
        $response = $client->getResponse();

        $uuid = $response->getContent();
        static::assertNotEmpty($uuid);
        static::assertEquals($expected, $uuid);
    }
}
