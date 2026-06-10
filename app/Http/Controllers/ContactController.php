<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email',
            'subject'    => 'nullable|string|max:200',
            'message'    => 'required|string',
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'subject'    => $request->subject,
            'pesan'      => $request->message, // ← ganti nama jadi 'pesan'
        ];

        Mail::send('emails.contact', $data, function ($mail) use ($data) {
            $mail->to('ohong02@gmail.com')
                 ->replyTo($data['email'], $data['first_name'] . ' ' . $data['last_name'])
                 ->subject('📩 Pesan Baru: ' . ($data['subject'] ?? 'Portfolio Contact'));
        });

        return back()->with('success', 'Pesan berhasil dikirim! Saya akan segera membalas.');
    }
}
