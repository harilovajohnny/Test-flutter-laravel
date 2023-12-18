<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * fonction qui redirige vers la page d'accueil ou dashboard de l'application 
     */
    public function index()
    {
        $count = User::count();
        $user_connected = User::whereNotNull('last_login_at')->whereNull('last_logout_at')->count();
        $user_deleted = User::onlyTrashed()->count();

        return view('dashboard.index',[
            'user_count' => $count,
            'user_connected' => $user_connected,
            'user_deleted' => $user_deleted
        ]);
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
