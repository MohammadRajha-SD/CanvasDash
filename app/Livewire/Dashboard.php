<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Widget;

class Dashboard extends Component
{
    public $widgets = [];

    public function mount()
    {
        $this->widgets = Widget::where('user_id', auth()->id())->get() ?? collect();
    }

    public function saveWidgets()
    {
        $this->dispatch('widgets-saved', ['message' => 'Widgets layout saved successfully!']);
    }
    public function render()
    {
        return view('livewire.dashboard')->extends('layouts.app');
    }
}
