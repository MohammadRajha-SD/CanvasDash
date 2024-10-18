<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class WeatherWidget extends Component
{
    public $settings;
    public $weatherData;

    public function mount($settings)
    {
        $this->settings = $settings;
        $this->fetchWeatherData();
    }

    public function fetchWeatherData()
    {
        // $location = $this->settings['location'] ?? 'London';
        // $apiKey = env('WEATHER_API_KEY');
        // $response = Http::get("https://api.open-meteo.com/v1/forecast", [
        //     'latitude' => '51.5074',
        //     'longitude' => '0.1278',
        //     'daily' => 'temperature_2m_max,temperature_2m_min',
        //     'timezone' => 'GMT',
        // ]);

        // $this->weatherData = $response->json();
    }
    public function render()
    {
        return view('livewire.weather-widget');
    }
}
