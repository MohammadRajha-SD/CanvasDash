<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Widget;

class Dashboard extends Component
{

    protected $listeners = ['updateWidget', 'refresh' => '$refresh'];
    public $id, $newX, $newY, $newWidth, $newHeight;

    public function updateWidget()
    {
        $widget = Widget::findOrFail($this->id);

        if ($widget) {
            $widget->update([
                'width' => $this->newWidth,
                'height' => $this->newHeight,
                'x' => $this->newX,
                'y' => $this->newY,
            ]);
        }

        // $this->dispatch('refresh');
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
