<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GeometryControllerTest extends WebTestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testCircleCalculation(): void
    {
        $radius = 5;
        $this->client->request('GET', "/circle/$radius");

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        
        $responseData = json_decode($this->client->getResponse()->getContent(), true);
        
        $this->assertIsArray($responseData);
        $this->assertArrayHasKey('surface', $responseData);
        $this->assertArrayHasKey('circumference', $responseData);
        $this->assertArrayHasKey('radius', $responseData);
        
        // Test actual values (rounded to 2 decimal places)
        $this->assertEquals(round(pi() * pow($radius, 2), 2), $responseData['surface']);
        $this->assertEquals(round(2 * pi() * $radius, 2), $responseData['circumference']);
        $this->assertEquals($radius, $responseData['radius']);
    }

    public function testTriangleCalculation(): void
    {
        $a = 3;
        $b = 4;
        $c = 5;
        $this->client->request('GET', "/triangle/$a/$b/$c");

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        
        $responseData = json_decode($this->client->getResponse()->getContent(), true);
        
        $this->assertIsArray($responseData);
        $this->assertArrayHasKey('surface', $responseData);
        $this->assertArrayHasKey('circumference', $responseData);
        $this->assertArrayHasKey('a', $responseData);
        $this->assertArrayHasKey('b', $responseData);
        $this->assertArrayHasKey('c', $responseData);
        
        // Test actual values
        $s = ($a + $b + $c) / 2; // semi-perimeter
        $expectedArea = sqrt($s * ($s - $a) * ($s - $b) * ($s - $c));
        
        $this->assertEquals(round($expectedArea, 2), $responseData['surface']);
        $this->assertEquals(round($a + $b + $c, 2), $responseData['circumference']);
    }
} 