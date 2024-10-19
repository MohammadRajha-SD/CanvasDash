<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Widget;

class Dashboard extends Component
{

    protected $listeners = ['updateWidget', 'refresh' => '$refresh'];

    public function updateWidget($id, $width, $height, $x, $y)
    {
        $widget = Widget::findOrFail($id);

        if ($widget) {
            $widget->update([
                'width' => $width,
                'height' => $height,
                'x' => $x,
                'y' => $y,
            ]);
        }

        return redirect('/dashboard');
    }

    public function saveWidgets()
    {
        $this->dispatch('widgets-saved', ['message' => 'Widgets layout saved successfully!']);
    }

    public function render()
    {
        $widgets = Widget::where('user_id', auth()->id())->get() ?? collect();

        return view('livewire.dashboard', compact('widgets'))->extends('layouts.app');
    }
}
