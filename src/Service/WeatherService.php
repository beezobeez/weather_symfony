<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\Exception\ClientException;

class WeatherService
{
    const UNITS = 'metric';

    /**
     * Get temperature by city
     *
     * @param String $city
     * @param String $units
     *
     * @throws
     * @return mixed
     */
    public static function getTemperatureByCity(string $city, string $units = self::UNITS): float
    {
        $responseBody = null;
        $client = HttpClient::create();

        try {

            $response = $client->request(
                'GET',
                getenv('OPEN_WEATHER_API_HOST'),
                [
                    'query' => [
                        'q'     => $city,
                        'units' => $units,
                        'APPID' => getenv('OPEN_WEATHER_API_KEY')
                    ],
                ]
            );

            $responseBody = $response->toArray();

        } catch (ClientException $e) {

            return false;
        }

        return isset($responseBody['main']['temp']) ? $responseBody['main']['temp'] : false;
    }
}
