<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class StockWidget extends Component
{
    public $settings;
    public $stockData = [];

    public function mount($settings)
    {
        $this->settings = $settings;
        // $this->fetchStockData();
    }

    public function fetchStockData()
    {
        // $symbol = $this->settings['symbol'] ?? 'AAPL';
        // $response = Http::get("https://api.example.com/stock/$symbol");
        // $this->stockData = $response->json();
    }
    public function render()
    {
        return view('livewire.stock-widget');
    }
}
