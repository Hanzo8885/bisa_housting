<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
  public function send(Request $request)
    {
        // 1. Validasi input form kontak
        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email',
            'subject'    => 'required|string',
            'message'    => 'required|string',
        ]);

        // 2. Mengambil API Key dari Railway Variables
        $apiKey = env('BREVO_API_KEY');

        // 3. Mengirim data ke API Brevo menggunakan HTTP Client bawaan Laravel
        $response = Http::withHeaders([
            'api-key' => $apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => [
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => 'ohong02@gmail.com' // 👈 WAJIB: Harus sama dengan email akun Brevo kamu agar tidak dianggap spam/no-subject
            ],
            'to' => [
                [
                    'email' => 'ohong02@gmail.com', // 👈 Email tujuan penerima pesan (email kamu juga)
                    'name' => 'Alfikar Radhestian'
                ]
            ],
            'replyTo' => [
                'email' => $request->email,
                'name' => $request->first_name
            ],
            'subject' => '📩 Pesan Baru: ' . $request->subject,
            'htmlContent' => '
                <h3>Ada Pesan Baru dari Form Kontak Website!</h3>
                <p><b>Nama:</b> ' . $request->first_name . ' ' . $request->last_name . '</p>
                <p><b>Email Pengirim:</b> ' . $request->email . '</p>
                <p><b>Subjek:</b> ' . $request->subject . '</p>
                <p><b>Isi Pesan:</b></p>
                <p>' . nl2br(e($request->message)) . '</p>
            '
        ]);

        // 4. Cek apakah pengiriman sukses atau gagal
        if ($response->successful()) {
            return back()->with('success', 'Pesan Anda berhasil dikirim!');
        }

        return back()->with('error', 'Gagal mengirim pesan. Silakan coba beberapa saat lagi.');
    }
}