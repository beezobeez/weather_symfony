<?php
// src/Controller/TemperatureController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

use App\Service\WeatherService;

class TemperatureController extends AbstractController
{
    /**
     * @Route("/temperature/{city}/{units}", name="temperature", methods={"GET"})
     *
     * @param WeatherService $weatherService
     * @param String $city
     * @param String $units
     *
     * @return Response
     */
    public function temperatureByCity(WeatherService $weatherService, $city = null, $units = "metric")
    {
        if(is_null($city)) {

            Throw new BadRequestHttpException('Please include a city name');
        }

        $temperature = $weatherService::getTemperatureByCity($city, $units);

        return $this->json(
            ['temperature' => $temperature ?: 'Please include a valid city name']
        );
    }
}
