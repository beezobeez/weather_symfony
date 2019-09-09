<?php
// tests/Controller/TemperatureControllerTest.php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TemperatureControllerTest extends WebTestCase
{
    public function testTemperatureByCityWithCityAndUnits()
    {
        $client = static::createClient();

        $client->request('GET', '/temperature/paris/metric');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertContains('temperature', $client->getResponse()->getContent());
    }

    public function testTemperatureByCityWithCity()
    {
        $client = static::createClient();

        $client->request('GET', '/temperature/paris');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertContains('temperature', $client->getResponse()->getContent());
    }

    public function testTemperatureByCityWithNoParams()
    {
        $client = static::createClient();

        $client->request('GET', '/temperature');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }
}
