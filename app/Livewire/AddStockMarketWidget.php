<?php

namespace App\Livewire;

use App\Models\Widget;
use Livewire\Component;

class AddStockMarketWidget extends Component
{
    public $title = '';
    public $color = '#4caf50';
    public $width = 3;
    public $height = 3;
    public $user_id;
    public $description;
    public $stockMarketData;

    protected $rules = [
        'title' => 'required|string|max:255',
        'color' => 'required|string',
        'width' => 'required|integer|min:1|max:12',
        'height' => 'required|integer|min:1|max:12',
    ];

    public function mount()
    {

        $this->user_id = auth()->id();
        $this->stockMarketData = [];

        if (Widget::where('user_id', $this->user_id)->where('name', 'stockmarket-widget')->exists()) {
            return redirect('/dashboard');
        }
    }

    public function saveWidget()
    {
        $this->validate();

        Widget::create([
            'user_id' => $this->user_id,
            'name' => 'stockmarket-widget',
            'title' => $this->title,
            'description' => $this->description,
            'color' => $this->color,
            'x' => 0,
            'y' => 0,
            'width' => $this->width,
            'height' => $this->height,
        ]);

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Stock Market widget saved successfully!'
        ]);
    }
    public function render()
    {
        return view('livewire.add-stock-market-widget')->extends('layouts.app');
    }
}
