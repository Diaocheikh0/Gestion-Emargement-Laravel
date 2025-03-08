<?php

namespace App\Http\Controllers;

use App\Models\Emargement;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalProfesseurs = User::where('role', 'professeur')->count();
        $totalGestionnaires = User::where('role', 'gestionnaire')->count();
        $totalEmargements = Emargement::all()->count();
        $totalEmargementsDay = Emargement::whereDate('created_at', Carbon::today())->count();
        $totalEmargementsWeek = Emargement::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
        $totalEmargementsMonth = Emargement::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        return view('dashboard', compact('totalUsers', 'totalProfesseurs', 'totalGestionnaires', 'totalEmargements', 'totalEmargementsDay', 'totalEmargementsWeek', 'totalEmargementsMonth'));
    }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
