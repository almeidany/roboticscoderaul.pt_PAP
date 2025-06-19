<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
        $hasSchedule = \App\Models\Schedule::exists();
        return view('schedule.edit', compact('hasSchedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'schedules' => 'required|array',
            'schedules.*.weekday' => 'required|string|in:Segunda,Terça,Quarta,Quinta,Sexta',
            'schedules.*.start_time' => 'required|date_format:H:i',
            'schedules.*.end_time' => 'required|date_format:H:i|after:schedules.*.start_time',
        ]);

        $schedules = $request->input('schedules');

        foreach ($schedules as $item) {
            Schedule::updateOrCreate(
                ['weekday' => $item['weekday']],
                [
                    'start_time' => $item['start_time'],
                    'end_time' => $item['end_time']
                ]
            );
        }

        return redirect()->route('dashboard.index')->with('message', 'Horário Atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.  
     */
    public function destroy(Schedule $schedule)
    {
        //
        Schedule::query()->delete();
        return redirect()->route('schedule.edit')->with('message', 'Todos os horários foram eliminados com sucesso.');
    }
}
