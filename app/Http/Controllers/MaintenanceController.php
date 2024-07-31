<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function getEvents()
    {
        $maintenances = Maintenance::all();
        
        $events = $maintenances->map(function($maintenance) {
            return [
                'id' => $maintenance->id,
                'title' => $maintenance->title,
                'start' => $maintenance->date,
                'description' => $maintenance->description,
                'type' => $maintenance->type,
            ];
        });

        return response()->json($events);
    }
}