<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Mail\ContactMail;

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

        // 4. Proses pengiriman email menggunakan kelas Mailable resmi (Aman untuk Queue)
        Mail::to('ohong02@gmail.com')->queue(new ContactMail($data));

        // 5. Kembali ke halaman form dengan pesan sukses hijau
        return back()->with('success', 'Pesan berhasil dikirim! Saya akan segera membalas.');
    }
}