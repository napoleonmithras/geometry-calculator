<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GeometryControllerTest extends WebTestCase
{
    public function testWelcomePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Geometry Calculator');
    }

    public function testCircleCalculation(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/circle/5');

        // Output the current HTML to see what's being rendered
        error_log($crawler->html());

        $this->assertGreaterThan(0, $crawler->filter('.area')->count(), 'The ".area" selector is missing.');
    }
} 