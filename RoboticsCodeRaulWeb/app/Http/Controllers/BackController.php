<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Project;
use App\Models\Classes;
use App\Models\Sponser;
use App\Models\News;

class BackController extends Controller
{
    // Exemplo para contar presenças
    public function index()
    {
        //count
        $attendancesCount = Attendance::count();
        $usersCount = User::count();
        $projectsCount = Project::count();
        $classesCount = Classes::count();
        $newsCount = News::count();
        $sponsersCount = Sponser::count();

        //sum
        $rafflesSum = User::sum('raffles_sold');

        //4 últimos criados
        $latestUsers = User::latest()
            ->limit(4)
            ->get();
        return view('dashboard.index', compact('attendancesCount', 'usersCount', 'projectsCount', 'classesCount', 'sponsersCount', 'newsCount', 'rafflesSum', 'latestUsers'));
    }
}
