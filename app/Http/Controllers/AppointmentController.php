<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    /**
     * Display the appointment booking form.
     */
    public function create()
    {
        return view('appointment');
    }

    /**
     * Store a new appointment and redirect to WhatsApp.
     */
    public function store(Request $request)
    {
        App::setLocale('bn');

        $validated_data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:4',
            'whatsapp' => 'required|string|max:20',
            'service_type' => 'required|string',
            'transaction_id' => 'required|string|max:100',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        // Standardize WhatsApp Number
        $wa_number = preg_replace('/[^0-9]/', '', $request->whatsapp);
        if (strlen($wa_number) == 11 && strpos($wa_number, '01') === 0) {
            $wa_number = '88' . $wa_number;
        }

        // Unified User Account Logic (WhatsApp-based)
        $user = \App\Models\User::where('whatsapp_number', $wa_number)->first();
        
        if (!$user) {
            $user = \App\Models\User::firstOrCreate(
                ['email' => $validated_data['email']],
                [
                    'name' => $validated_data['full_name'],
                    'whatsapp_number' => $wa_number,
                    'password' => \Illuminate\Support\Facades\Hash::make($validated_data['password']),
                    'role' => 'client'
                ]
            );
        }

        // Auto-login the user
        \Illuminate\Support\Facades\Auth::login($user);

        try {
            $appointment = new Appointment();
            $appointment->user_id = $user->id;
            $appointment->full_name = $validated_data['full_name'];
            $appointment->email = $validated_data['email'];
            $appointment->whatsapp_number = $wa_number;
            $appointment->service_type = $validated_data['service_type'];
            $appointment->transaction_id = $validated_data['transaction_id'];
            $appointment->appointment_date = $validated_data['appointment_date'];
            $appointment->appointment_time = $validated_data['appointment_time'] ?? null;
            $appointment->message = $validated_data['message'] ?? null;
            $appointment->status = 'pending';
            $appointment->is_paid = false;
            $appointment->save();

            // WhatsApp Redirection Logic for Appointment
            $mam_number = '8801716437859';
            $message_body = "আসসালামু আলাইকুম শারমিন মুজাহিদ ম্যাম,\n\n" .
                            "আমি একটি নতুন সেশনের অ্যাপয়েন্টমেন্ট বুক করেছি।\n\n" .
                            "• নাম: {$appointment->full_name}\n" .
                            "• তারিখ: {$appointment->appointment_date}\n" .
                            "• সময়: " . ($appointment->appointment_time ?? 'আলোচনা সাপেক্ষে') . "\n" .
                            "• সার্ভিস: {$appointment->service_type}\n" .
                            "• ট্রানজেকশন আইডি: {$appointment->transaction_id}\n" .
                            "• ফোন: {$appointment->whatsapp_number}\n";

            if ($appointment->message) {
                $message_body .= "• বার্তা: {$appointment->message}\n";
            }

            $message_body .= "\nদয়া করে আমার অ্যাপয়েন্টমেন্টটি নিশ্চিত করুন। ধন্যবাদ।";

            $whatsapp_url = "https://wa.me/{$mam_number}?text=" . urlencode($message_body);

            return redirect()->away($whatsapp_url);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Appointment Storage Failure: ' . $e->getMessage());
            return back()->withInput()->withErrors(['message' => 'দুঃখিত, তথ্য সংরক্ষণে সমস্যা হয়েছে। (Error: ' . $e->getMessage() . ')']);
        }
    }

    /**
     * Admin view for all appointments.
     */
    public function index()
    {
        $appointments = Appointment::whereNotIn('status', ['completed', 'canceled'])->latest()->paginate(15);
        $stats = (object)[
            'total' => Appointment::count(),
            'pending' => Appointment::where('status', 'pending')->count(),
            'active' => Appointment::where('status', 'active')->count(),
        ];

        return view('admin.appointments', compact('appointments', 'stats'));
    }

    /**
     * Display completed appointments (Archive).
     */
    public function archive()
    {
        $appointments = Appointment::where('status', 'completed')->latest()->paginate(15);
        $title = 'Appointment Archive';
        return view('admin.archive_appointments', compact('appointments', 'title'));
    }

    /**
     * Update appointment status.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,active,completed,canceled',
            'payment_amount' => 'nullable|numeric',
        ]);

        $appointment = Appointment::findOrFail($id);
        
        if ($request->status === 'canceled') {
            $appointment->delete();
            return redirect()->back()->with('success', 'অ্যাপয়েন্টমেন্টটি ডিলিট করা হয়েছে।');
        }

        $appointment->status = $request->status;
        
        if ($request->has('payment_amount')) {
            $appointment->payment_amount = $request->payment_amount;
        }
        
        $appointment->is_paid = $request->has('is_paid') ? true : false;
        $appointment->save();

        $msg = $request->status === 'completed' ? 'অ্যাপয়েন্টমেন্ট সফলভাবে সম্পন্ন হয়েছে।' : 'Appointment updated.';
        return redirect()->back()->with('success', $msg);
    }

    /**
     * Update advanced appointment details (Notes, Payment) via Admin.
     */
    public function updateAdvancedDetails(Request $request, $id)
    {
        $request->validate([
            'payment_amount' => 'nullable|numeric',
            'admin_notes' => 'nullable|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->only(['payment_amount', 'admin_notes']));

        return redirect()->back()->with('success', 'Advanced appointment details and payment tracking updated successfully.');
    }
}
