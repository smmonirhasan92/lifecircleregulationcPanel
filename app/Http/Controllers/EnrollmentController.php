<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Enrollment;
use App\Models\Setting;
use Illuminate\Support\Facades\App;

class EnrollmentController extends Controller
{
    /**
     * Display the enrollment form.
     */
    public function create()
    {
        $early_bird_deadline = Setting::get('early_bird_deadline');
        return view('enroll', compact('early_bird_deadline'));
    }

    /**
     * Store a new enrollment and redirect to WhatsApp.
     */
    public function store(Request $request)
    {
        // Set locale to Bengali for humanized validation messages
        App::setLocale('bn');

        $validated_data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:4',
            'whatsapp' => 'required|string|max:20',
            'service_type' => 'required|string',
            'transaction_id' => 'required|string|max:100',
            'message' => 'nullable|string',
        ]);

        $enrollmentData = $validated_data;

        // Standardize WhatsApp Number (Add 88 prefix if needed)
        $wa_number = preg_replace('/[^0-9]/', '', $enrollmentData['whatsapp']);
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
            // Humanized Logic: Save lead to database before redirection
            $enrollment = new Enrollment();
            $enrollment->user_id = $user->id;
            $enrollment->full_name = $validated_data['full_name'];
            $enrollment->email = $validated_data['email'];
            $enrollment->whatsapp_number = $wa_number;
            $enrollment->service_type = $validated_data['service_type'];
            $enrollment->transaction_id = $validated_data['transaction_id'];
            $enrollment->message = $validated_data['message'] ?? null;
            $enrollment->status = 'pending';
            $enrollment->is_paid = false;
            $enrollment->save();

            // Professional WhatsApp Redirection Logic
            $mam_number = '8801716437859';
            $message_body = "আসসালামু আলাইকুম শারমিন মুজাহিদ ম্যাম,\n\n" .
                            "আমি নতুন রিলেশনাল ওয়েলনেস সেশনের জন্য আবেদন করেছি। আমার তথ্যাবলি নিচে দেয়া হলো:\n\n" .
                            "• নাম: {$enrollment->full_name}\n" .
                            "• সার্ভিস: {$enrollment->service_type}\n" .
                            "• ট্রানজেকশন আইডি: {$enrollment->transaction_id}\n" .
                            "• ফোন: {$enrollment->whatsapp_number}\n";
            
            if ($enrollment->message) {
                $message_body .= "• বার্তা: {$enrollment->message}\n";
            }

            $message_body .= "\nদয়া করে আমার সেশনটি নিশ্চিত করুন। ধন্যবাদ।";

            $whatsapp_url = "https://wa.me/{$mam_number}?text=" . urlencode($message_body);

            return redirect()->away($whatsapp_url);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Enrollment Storage Failure: ' . $e->getMessage());
            return back()->withInput()->withErrors(['message' => 'দুঃখিত, তথ্য সংরক্ষণে সমস্যা হয়েছে। (Error: ' . $e->getMessage() . ')']);
        }
    }

    /**
     * Display all enrollments for Admin.
     */
    public function index()
    {
        $enrollments = Enrollment::whereNotIn('status', ['completed', 'canceled'])->latest()->paginate(15);
        
        $stats = (object)[
            'total' => Enrollment::count(),
            'pending' => Enrollment::where('status', 'pending')->count(),
            'active' => Enrollment::where('status', 'active')->count(),
            'completed' => Enrollment::where('status', 'completed')->count(),
        ];

        $early_bird_deadline = Setting::get('early_bird_deadline');

        return view('admin.list', compact('enrollments', 'stats', 'early_bird_deadline'));
    }

    /**
     * Display completed enrollments (Archive).
     */
    public function archive()
    {
        $enrollments = Enrollment::where('status', 'completed')->latest()->paginate(15);
        $title = 'Enrollment Archive';
        return view('admin.archive', compact('enrollments', 'title'));
    }

    /**
     * Update the status of an enrollment via Admin Panel.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,active,completed,canceled',
            'payment_amount' => 'nullable|numeric',
        ]);

        $enrollment = Enrollment::findOrFail($id);
        
        if ($request->status === 'canceled') {
            $enrollment->delete();
            return redirect()->back()->with('success', 'ব্যর্থ আবেদনটি সফলভাবে ডিলিট করা হয়েছে।');
        }

        $enrollment->status = $request->status;
        
        if ($request->has('payment_amount')) {
            $enrollment->payment_amount = $request->payment_amount;
        }
        
        $enrollment->is_paid = $request->has('is_paid') ? true : false;
        $enrollment->save();

        $msg = $request->status === 'completed' ? 'আবেদনটি সফলভাবে শেষ করা হয়েছে এবং আর্কাইভে সানো হয়েছে।' : 'Status updated successfully.';
        return redirect()->back()->with('success', $msg);
    }

    /**
     * Update advanced course details (Duration, Dates, Notes) via Admin.
     */
    public function updateAdvancedDetails(Request $request, $id)
    {
        $request->validate([
            'course_duration' => 'nullable|string|max:100',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'payment_amount' => 'nullable|numeric',
            'admin_notes' => 'nullable|string',
        ]);

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($request->only(['course_duration', 'start_date', 'end_date', 'payment_amount', 'admin_notes']));

        return redirect()->back()->with('success', 'Advanced course details and payment tracking updated successfully.');
    }
}
