<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Maintenance;

class MaintenanceCalendar extends Component
{
    public $events = [];

    public function mount()
    {
        $this->events = Maintenance::all()->map(function ($maintenance) {
            return [
                'id' => $maintenance->id,
                'title' => $maintenance->title,
                'start' => $maintenance->date,
                'description' => $maintenance->description,
                'type' => $maintenance->type,
            ];
        });
    }

    public function render()
    {
        return view('livewire.maintenance-calendar');
    }
}