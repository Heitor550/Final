<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Equipamento;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index() {
        $search = request("search");

        if ($search) {
            $events = Event::where("title", "like", "%" . $search . "%")->get();
        } else {
            $events = Event::with('equipamento')->get();
        }

        return view('welcome', ["events" => $events, "search" => $search]);
    }

    public function create() {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        
        $events = Event::whereYear('date', $currentYear)
                       ->whereMonth('date', $currentMonth)
                       ->get();

        $calendarEvents = $events->map(function ($event) {
            return [
                'title' => $event->title,
                'start' => $event->date,
                'url' => route('events.show', $event->id),
                'backgroundColor' => $event->type == 'Corretiva' ? '#dc3545' : '#28a745', // Vermelho para corretiva, verde para preventiva
            ];
        });

        $equipamentos = Equipamento::all();

        return view("events.create", compact('calendarEvents', 'equipamentos'));
    }

    public function store(Request $request)
    {
        \Log::info('Request data:', $request->all());

        try {
            $validator = \Validator::make($request->all(), [
                'equipamento_id' => 'required|exists:equipamentos,id',
                'title' => 'required',
                'description' => 'nullable',
                'type' => 'required|in:Corretiva,Preventiva',
                'date' => 'required|date',
                'items' => 'nullable',
            ]);

            if ($validator->fails()) {
                \Log::error('Validation failed:', $validator->errors()->toArray());
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with("msg", "Erro de validação. Por favor, verifique os campos.")
                    ->with("msg_type", "failure");
            }

            $event = new Event;
            $event->equipamento_id = $request->equipamento_id;
            $event->title = $request->title;
            $event->description = $request->description;
            $event->type = $request->type;
            $event->date = $request->date;

            //Teste
            $event->items = $request->items;
            // Mais testes :(
            $event->user_id = auth()->id();

            \Log::info('Attempting to save event:', $event->toArray());

            $event->save();

            \Log::info('Event saved successfully. ID: ' . $event->id);

            return redirect("/")->with("msg", "Agendamento realizado com sucesso!")->with("msg_type", "success");
        } catch (\Exception $e) {
            \Log::error('Error in store method: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->back()
                ->with("msg", "Ocorreu um erro ao realizar o agendamento: " . $e->getMessage())
                ->with("msg_type", "failure")
                ->withInput();
        }
    }

    public function finish(Event $event)
    {
        $event->finished = true;
        $event->save();
        return redirect('/')->with('success', 'Manutenção finalizada com sucesso!');
    }

    public function show($id) {
        $event = Event::with('equipamento')->findOrFail($id);
        return view('events.show', ["event" => $event]);
    }
}