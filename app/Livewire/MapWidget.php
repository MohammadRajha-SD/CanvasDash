<?php

namespace App\Livewire;

use Livewire\Component;

class MapWidget extends Component
{
    public $latitude = 33.8938;
    public $longitude = 35.5018;
    public $widget;
    public $height;
    public $width;
    
    protected $listeners = ['updateLocation'];

    public function mount($widget)
    {
        $this->widget = $widget ?? collect();
        $this->width = ($widget['width'] * 110) . 'px';
        $this->height = ($widget['height'] * 80) . 'px';
    }
    public function updateLocation($lat, $lng)
    {
        $this->latitude = $lat;
        $this->longitude = $lng;
    }
    public function render()
    {
        return view('livewire.map-widget')->extends('layouts.app');
    }
}
