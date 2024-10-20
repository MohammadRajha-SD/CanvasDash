<?php

namespace App\Livewire;

use Livewire\Component;

class StockmarketWidget extends Component
{
    public $widget;

    public function mount($widget)
    {
        $this->widget = $widget ?? collect();
    }

    public function render()
    {
        return view('livewire.stockmarket-widget');
    }
}
