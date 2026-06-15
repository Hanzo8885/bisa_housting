<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Menyusun data dari form kontak
        $data = [
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'subject'    => $request->subject,
            'pesan'      => $request->message,
        ];

        // Mengirim email secara inline menggunakan view template tanpa memanggil class ContactMail
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('ohong02@gmail.com')
                    ->replyTo($data['email'], $data['first_name'] . ' ' . $data['last_name'])
                    ->subject('📩 Pesan Baru: ' . ($data['subject'] ?? 'Form Kontak'));
        });

        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}