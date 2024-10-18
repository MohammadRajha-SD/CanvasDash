<?php

namespace App\Livewire;

use Livewire\Component;

class WidgetSettings extends Component
{
    public $widget;
    public $settings;

    public function mount($widget)
    {
        $this->widget = $widget;
        $this->settings = $widget['settings'];
    }

    public function saveSettings()
    {
        $this->dispatch('updateWidgetSettings', $this->widget['name'], $this->settings);
    }
    public function render()
    {
        return view('livewire.widget-settings');
    }
}
