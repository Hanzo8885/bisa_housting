<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // 1. Validasi input dari form portfolio
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email',
            'subject'    => 'nullable|string|max:200',
            'message'    => 'required|string',
        ]);

        // 2. Paksa URL internal Laravel menggunakan HTTPS saat di server production
        if (config('app.env') === 'production' || app()->environment('production')) {
            URL::forceScheme('https');
        }

        // 3. Menyusun data untuk dikirim ke template view (emails.contact)
        $data = [
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'subject'    => $request->subject,
            'pesan'      => $request->message,
        ];

        // 4. Proses pengiriman email secara langsung (Synchronous)
        Mail::send('emails.contact', $data, function ($mail) use ($data) {
            $mail->from(config('mail.from.address', 'ohong02@gmail.com'), config('mail.from.name', 'Alfikar Portfolio'))
                 ->to('ohong02@gmail.com')
                 ->replyTo($data['email'], $data['first_name'] . ' ' . $data['last_name'])
                 ->subject('📩 Pesan Baru: ' . ($data['subject'] ?? 'Portfolio Contact'));
        });

        // 5. Kembali ke halaman form dengan pesan sukses hijau
        return back()->with('success', 'Pesan berhasil dikirim! Saya akan segera membalas.');
    }
}