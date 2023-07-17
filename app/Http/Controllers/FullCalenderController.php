<?php

namespace App\Http\Controllers;

use App\Models\TurnoEspecialista;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon; // Aquí se agrega la declaración de Carbon
use Illuminate\Support\Arr;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = TurnoEspecialista::whereDate('event_start', '>=', $request->start)
                ->whereDate('event_end',   '<=', $request->end)
                ->get(['id', 'event_name', 'event_start', 'event_end']);
            return response()->json($data);
        }

        // $events = TurnoEspecialista::all();
        // return view('especialistas.turnos', compact('users', 'events'));
        $users = User::all();
        $events = TurnoEspecialista::all();


        $eventsFormatted = [];

        foreach ($events as $event) {
            $startFormatted = \Carbon\Carbon::createFromFormat('Y-m-d', $event->event_start)->format('Y-m-d');
            $endFormatted = \Carbon\Carbon::createFromFormat('Y-m-d', $event->event_end)->format('Y-m-d');

            // Comprobar si el evento ya existe para esa fecha
            $existingEvent = Arr::first($eventsFormatted, function ($value, $key) use ($startFormatted) {
                return $value['start'] === $startFormatted;
            });

            if ($existingEvent) {
                // Agregar el título del evento al evento existente
                $existingEvent['title'] .= ', ' . $event->event_name;
            } else {
                // Agregar un nuevo evento para esa fecha
                $eventsFormatted[] = [
                    'id' => $event->id,
                    'title' => $event->event_name,
                    'start' => $startFormatted,
                    'end' => $endFormatted,
                ];
            }
        }

        return view('especialistas.turnos', compact('users', 'eventsFormatted'));
    }

    public function calendarEvents(Request $request)
    {
        switch ($request->type) {
            case 'create':
                $event = TurnoEspecialista::create([
                    'event_name' => $request->event_name,
                    'event_start' => $request->event_start,
                    'event_end' => $request->event_end,
                ]);

                return response()->json($event);
                break;

            case 'edit':
                $event = TurnoEspecialista::find($request->id)->update([
                    'event_name' => $request->event_name,
                    'event_start' => $request->event_start,
                    'event_end' => $request->event_end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = TurnoEspecialista::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # ...
                break;
        }
    }
}
