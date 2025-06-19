<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::with('user')->latest()->get();
        return view('attendance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userAlreadyMarked = Auth::check() ?
            Attendance::where('user_id', Auth::id())
            ->whereDate('attendance_date', now('Europe/Lisbon')->toDateString())
            ->exists() : false;

        return view('attendance.create', compact('userAlreadyMarked'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $now = Carbon::now('Europe/Lisbon');
        $dayOfWeek = $now->dayOfWeek; // 3 for Wednesday, 5 for Friday
        $currentTime = $now->format('H:i:s');

        // Check if it's a valid day (Wednesday or Friday)
        if (!in_array($dayOfWeek, [3, 5])) {
            return back()->with('message', 'Presença só pode ser marcada nas quartas e sextas feira.');
        }

        // Check time restrictions
        if ($dayOfWeek == 3 && !($currentTime >= '11:50:00' && $currentTime <= '13:20:00')) {
            return back()->with('message', 'Nas Quartas, A presença só pode ser marcada entre as 11:50 e 13:20.');
        }

        if ($dayOfWeek == 5 && !($currentTime >= '13:35:00' && $currentTime <= '16:00:00')) {
            return back()->with('message', 'Nas Sextas-feiras, A presença só pode ser marcada entre as 13:35 e 16:00.');
        }

        // Check if user already marked attendance today
        $existingAttendance = Attendance::where('user_id', Auth::id())
            ->whereDate('attendance_date', $now->toDateString())
            ->first();

        if ($existingAttendance) {
            return back()->with('message', 'Já marcou a sua presença.');
        }

        // Create new attendance record
        Attendance::create([
            'user_id' => Auth::id(),
            'attendance_date' => $now,
        ]);

        return view('attendance.index')->with('message', 'Presença marcada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        return view('attendance.edit', compact('attendance'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance')->with('message', 'Presença eliminada com sucesso!');
    }
}
