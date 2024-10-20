<?php

namespace App\Livewire;

use Livewire\Component;

class NewsWidget extends Component
{
    public $widget;

    public function mount($widget)
    {
        // dd($widget->details);
        $this->widget = $widget ?? collect();
        $this->widget->details = json_decode($this->widget->details, true);
    }
    
    public function render()
    {
        return view('livewire.news-widget');
    }
}
