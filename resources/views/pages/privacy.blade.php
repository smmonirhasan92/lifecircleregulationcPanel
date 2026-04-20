@extends('layouts.app')

@section('title', 'Privacy Policy - Life Circle Regulation')

@section('content')
<div class="bg-surface pt-32 pb-20">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-white rounded-3xl shadow-sm border border-black/5 p-8 md:p-12">
            <h1 class="text-3xl md:text-5xl font-black text-primary font-manrope mb-8 border-b border-black/5 pb-6">Privacy Policy</h1>
            
            <div class="prose prose-lg text-secondary-dark max-w-none">
                <p class="text-sm text-secondary mb-8"><strong>Last Updated:</strong> {{ date('F Y') }}</p>

                <h3 class="text-2xl font-bold text-primary mt-8 mb-4">1. Information Collection</h3>
                <p>Welcome to Life Circle Regulation. We are committed to protecting your privacy. We collect personal information that you voluntarily provide to us when you express an interest in obtaining information about us or our services, or when you participate in activities on the Website.</p>
                <p>The personal information we collect may include: Names, Email Addresses, Phone Numbers, and Appointment Details.</p>

                <h3 class="text-2xl font-bold text-primary mt-8 mb-4">2. Medical & Counseling Confidentiality</h3>
                <p>As a psychological and developmental counseling institution, confidentiality is our highest priority. All session details, behavioral assessments, and personal discussions are kept strictly confidential in accordance with standard psychological ethics. Information will not be shared with third parties without your explicit written consent, except where required by law.</p>

                <h3 class="text-2xl font-bold text-primary mt-8 mb-4">3. Data Usage</h3>
                <p>We use personal information collected via our Website for a variety of business purposes described below:</p>
                <ul class="list-disc pl-6 space-y-2 mt-4">
                    <li>To facilitate appointment bookings and manage schedules.</li>
                    <li>To communicate with you regarding your sessions or inquiries.</li>
                    <li>To send administrative information to you.</li>
                    <li>To request feedback and contact you about your use of our Services.</li>
                </ul>

                <h3 class="text-2xl font-bold text-primary mt-8 mb-4">4. Data Security</h3>
                <p>We have implemented appropriate technical and organizational security measures designed to protect the security of any personal information we process. However, despite our safeguards and efforts to secure your information, no electronic transmission over the Internet or information storage technology can be guaranteed to be 100% secure.</p>

                <h3 class="text-2xl font-bold text-primary mt-8 mb-4">5. Contact Us</h3>
                <p>If you have questions or comments about this privacy policy, you may email us at <strong>lifecircle835@gmail.com</strong> or by post to our official address in Dhaka, Bangladesh.</p>
            </div>
        </div>
    </div>
</div>
@endsection
