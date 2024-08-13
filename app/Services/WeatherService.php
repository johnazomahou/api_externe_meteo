<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * WeatherService
 * Cette classe est responsable de la logique métier pour interagir avec l'API OpenWeatherMap.
 * Elle encapsule les appels API et la manipulation des données météorologiques,
 * permettant ainsi de séparer la logique métier de la logique de présentation.
 * Endpoint:
 * Example d'appelle d' API :
 * api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=2dc619810584bb9dd9b79f1f37cda614
 */
class WeatherService
{
    protected $apiKey;

    // ici le constructeur 
    public function __construct()
    {
        $this->apiKey = config('services.openweather.key');
    }

    public function getWeather($ville)
    {
        $response = Http::get('http://api.openweathermap.org/data/2.5/weather', [
            'q' => $ville,
            'appid' => $this->apiKey,
            'units' => 'metric',
            'lang' => 'fr',
        ]);

        return $response->json();
    }
}
