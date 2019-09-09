<?php
// tests/Service/WeatherServiceTest.php
namespace App\Tests\Util;

use App\Service\WeatherService;
use PHPUnit\Framework\TestCase;

class WeatherServiceTest extends TestCase
{
    public function testGetTemperatureByCityWithCityNameAndUnits()
    {
        $result = WeatherService::getTemperatureByCity('paris', 'metric');

        // assert that the response is a float
        $this->assertTrue(is_float($result));
    }

    public function testGetTemperatureByCityWithCityName()
    {
        $result = WeatherService::getTemperatureByCity('paris');

        // assert that the response is a float
        $this->assertTrue(is_float($result));
    }
}
