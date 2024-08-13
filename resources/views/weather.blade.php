<!DOCTYPE html>
<html>
<head>
    <title>Weather</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <!-- Formulaire pour saisir le nom de la ville -->
        <form action="{{ route('weather.show') }}" method="get">
            <!-- Champ de saisie pour le nom de la ville -->
            <input type="text" name="ville" placeholder="Nom de la ville" required>
            <!-- Bouton pour soumettre le formulaire -->
            <button type="submit">Obtenir la météo</button>
        </form>

        <!-- Affichage des informations météorologiques si disponibles -->
        @if (isset($weather))
            <!-- Titre avec le nom de la ville -->
            <h1>Météo à {{ $weather['name'] }}</h1>
            <!-- Affichage de la température -->
            <p>Température : {{ $weather['main']['temp'] }} °C</p>
            <!-- Affichage de la description météo -->
            <p>Description : {{ $weather['weather'][0]['description'] }}</p>
        @endif

        <!-- Affichage des messages d'erreur -->
        @error('error')
            <!-- Message d'erreur en rouge -->
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
</body>
</html>
