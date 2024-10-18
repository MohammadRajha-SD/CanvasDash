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
    public $widgetLayout = []; // Store layout changes

    public function saveWidgets()
    {
        // Save the new widget layout to the database
        foreach ($this->widgetLayout as $layout) {
            // // Example: Update widget positions in the database
            // Widget::where('id', $layout['id'])->update([
            //     'x' => $layout['x'],
            //     'y' => $layout['y'],
            //     'width' => $layout['width'],
            //     'height' => $layout['height'],
            // ]);
            dd($layout);
        }

        // Dispatch event to inform the user
        $this->dispatch('widgets-saved', ['message' => 'Widgets layout saved successfully!']);
    }

    private function defaultWidgets()
    {
        return [
            ['name' => 'weather-widget', 'settings' => ['location' => 'London']],
            // ['name' => 'stock-widget', 'settings' => ['symbol' => 'AAPL']],
        ];
    }
    public function render()
    {
        return view('livewire.dashboard')->extends('layouts.app');
    }
}
