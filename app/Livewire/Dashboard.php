<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserPreference;
class Dashboard extends Component
{
    public $widgets = [];

    public function mount()
    {
        $this->loadWidgets();
    }

    public function loadWidgets()
    {
        $preferences = UserPreference::where('user_id', auth()->id())->first();
        $this->widgets = $preferences ? $preferences->widgets : $this->defaultWidgets();
    }

    public function saveWidgets()
    {
        UserPreference::updateOrCreate(
            ['user_id' => auth()->id()],
            ['widgets' => $this->widgets]
        );
        dd(['user_id' => auth()->id()],['widgets' => $this->widgets]);
        // $this->dispatchBrowserEvent('widgets-saved', ['message' => 'Widgets saved!']);
    }

    private function defaultWidgets()
    {
        return [
            ['name' => 'weather-widget', 'settings' => ['location' => 'London']],
            ['name' => 'stock-widget', 'settings' => ['symbol' => 'AAPL']],
        ];
    }
    public function render()
    {
        return view('livewire.dashboard')->extends('layouts.app');
    }
}
