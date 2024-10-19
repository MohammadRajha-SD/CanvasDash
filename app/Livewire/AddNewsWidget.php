<?php

namespace App\Livewire;

use App\Models\Widget;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class AddNewsWidget extends Component
{
    public $title = '';
    public $color = '#4caf50';
    public $width = 4;
    public $height = 2;
    public $date;
    public $user_id;

    public $newsData;

    protected $rules = [
        'title' => 'required|string|max:255',
        'color' => 'required|string',
        'width' => 'required|integer|min:1|max:12',
        'height' => 'required|integer|min:1|max:12',
    ];

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->user_id = auth()->id();
        $this->newsData = [];

        if (Widget::where('user_id', $this->user_id)->where('name', 'news-widget')->exists()) {
            return redirect('/dashboard');
        }
    }

    public function fetchNewsData()
    {
       
    }

    public function saveWidget()
    {
        $this->validate();

        $this->fetchNewsData();

        Widget::create([
            'user_id' => $this->user_id,
            'name' => 'news-widget',
            'title' => $this->title,
            'color' => $this->color,
            'x' => 0,
            'y' => 0,
            'width' => $this->width,
            'height' => $this->height,
            'details' => json_encode([
                'longitude' => $this->longitude,
                'latitude' => $this->latitude,
                'icon' => $this->weatherData['icon'],
                'datetime' => $this->weatherData['datetime'],
                'description' => $this->weatherData['description'] ?? 'No description available',
                'temp' => $this->weatherData['temp'],
                'conditions' => $this->weatherData['conditions'],
            ]),
        ]);

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'News widget saved successfully!'
        ]);
    }
    public function render()
    {
        return view('livewire.add-news-widget')->extends('layouts.app');
    }
}
