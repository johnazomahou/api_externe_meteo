<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

/**
 * Contrôleur pour gérer les requêtes liées à la météo.
 */
class WeatherController extends Controller
{
    /**
     * Instance du service météo.
     *
     * @var WeatherService
     */
    protected $weatherService;

    /**
     * Constructeur du contrôleur.
     *
     * @param WeatherService $weatherService Service d'API météo injecté
     */
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Affiche les informations météorologiques pour une ville donnée.
     *
     * @param Request $request Requête HTTP contenant les données du formulaire
     * @return \Illuminate\View\View Vue avec les données météo ou message d'erreur
     */
    public function showWeather(Request $request)
    {
        // Valide la présence et le format du nom de la ville
        $request->validate([
            'ville' => 'required|string',
        ]);

        // Récupère le nom de la ville depuis la requête
        $ville = $request->input('ville');

        // Appelle le service météo pour obtenir les données
        $weather = $this->weatherService->getWeather($ville);

        // Vérifie si la requête à l'API a échoué
        if (isset($weather['cod']) && $weather['cod'] != 200) {
            // Retourne la vue avec un message d'erreur si la ville n'est pas trouvée
            return view('weather')->withErrors(['error' => 'Ville non trouvée']);
        }

        // Retourne la vue avec les données météo si la requête a réussi
        return view('weather', ['weather' => $weather]);
    }



    public function showForm()
{
    return view('weather');
}
}