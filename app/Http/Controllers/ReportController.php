<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Enrollment;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Extraordinary Reports Dashboard
        $totalRevenue = Appointment::where('is_paid', true)->sum('payment_amount') + 
                        Enrollment::where('is_paid', true)->sum('payment_amount');
        
        $totalSessions = Appointment::where('status', 'completed')->count();
        $totalEnrollments = Enrollment::count();
        
        // Detailed Revenue Matrix
        $revenueByService = [];
        
        // 1. Enrollment Revenue (DMC Course)
        $enrollmentRevenue = Enrollment::where('is_paid', true)->sum('payment_amount');
        if ($enrollmentRevenue > 0) {
            $revenueByService['DMC Certificate Course'] = $enrollmentRevenue;
        }

        // 2. Appointment Revenue by Service Type
        $appointmentRevenues = Appointment::where('is_paid', true)
                                ->select('service_type', DB::raw('SUM(payment_amount) as total'))
                                ->groupBy('service_type')
                                ->get();

        foreach ($appointmentRevenues as $ar) {
            $revenueByService[$ar->service_type] = $ar->total;
        }

        $stats = [
            'total_revenue' => $totalRevenue,
            'verified_paid' => $totalRevenue,
            'pending_dues' => Enrollment::where('is_paid', false)->count() + Appointment::where('is_paid', false)->count(),
            'enrollment_count' => $totalEnrollments,
            'appointment_count' => Appointment::count(),
            'revenue_by_service' => $revenueByService
        ];

        // Recent successful payments
        $recentPayments = Appointment::where('is_paid', true)
                            ->orderBy('updated_at', 'desc')
                            ->take(5)
                            ->get();

        // Unique clients count from both tables + users
        $clients = $this->aggregateClients();

        return view('admin.reports', compact(
            'stats', 'totalSessions', 'totalEnrollments', 'recentPayments', 'clients'
        ));
    }

    public function clients()
    {
        $clients = $this->aggregateClients();
        return view('admin.clients', compact('clients'));
    }

    /**
     * Helper to unify clients from Users, Enrollments, and Appointments.
     * Rewritten to use safer fromSub() to prevent environment-specific driver errors.
     */
    private function aggregateClients()
    {
        $u1 = DB::table('users')->select('whatsapp_number', 'name', 'email', 'role', 'created_at');
        
        $u2 = DB::table('enrollments')
                ->select('whatsapp_number', 'full_name as name', 'email', DB::raw("'client' as role"), 'created_at');
        
        $u3 = DB::table('appointments')
                ->select('whatsapp_number', 'full_name as name', 'email', DB::raw("'client' as role"), 'created_at');

        $combinedQuery = $u1->union($u2)->union($u3);

        return DB::table('combined')
                ->fromSub($combinedQuery, 'combined')
                ->whereNotNull('whatsapp_number')
                ->where('whatsapp_number', '!=', '')
                ->select('whatsapp_number', 'name', 'email', 'role', DB::raw('MAX(created_at) as last_interaction'))
                ->groupBy('whatsapp_number', 'name', 'email', 'role')
                ->orderBy('last_interaction', 'desc')
                ->get();
    }

    public function clientProfile($whatsapp)
    {
        $enrollments = Enrollment::where('whatsapp_number', $whatsapp)->orderBy('created_at', 'desc')->get();
        $appointments = Appointment::where('whatsapp_number', $whatsapp)->orderBy('created_at', 'desc')->get();
        
        $client = $enrollments->first() ?? $appointments->first();

        if (!$client) {
            $user = DB::table('users')->where('whatsapp_number', $whatsapp)->first();
            if ($user) {
                $client = (object)[
                    'whatsapp_number' => $user->whatsapp_number,
                    'full_name' => $user->name,
                    'email' => $user->email,
                ];
            } else {
                return redirect()->route('admin.clients')->with('error', 'Client not found.');
            }
        }

        return view('admin.client.show', compact('client', 'enrollments', 'appointments'));
    }
}
