<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Shipment;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    /**
     * Show admin login form
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle admin login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (
            !Auth::guard('admin')->attempt(
                $credentials,
                $request->boolean('remember')
            )
        ) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    /**
     * Show admin dashboard
     */
    public function showDashboard()
    {
        // Total Shipments (All time)
        $totalShipments = Shipment::count();

        // Shipments created this week
        $shipmentsThisWeek = Shipment::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        // Fetch Latest 5 Deliveries
        $latestDeliveries = Shipment::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalShipments',
            'shipmentsThisWeek',
            'latestDeliveries'
        ));
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
