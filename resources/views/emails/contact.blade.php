<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Portfolio</title>
</head>
<body style="margin:0; padding:0; background:#f5f5f5; font-family: 'Inter', Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f5f5f5; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:16px; overflow:hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background:#0D0D0D; padding: 32px 40px;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <div style="width:40px; height:40px; background:linear-gradient(135deg,#00C896,#007A5E); border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-weight:700; color:#fff; font-size:16px; line-height:40px; text-align:center;">A</div>
                                    </td>
                                    <td style="padding-left:12px; vertical-align:middle;">
                                        <span style="color:#ffffff; font-size:1.1rem; font-weight:700;">Alfikar Radestian Prasenja</span>
                                    </td>
                                </tr>
                            </table>
                            <h1 style="color:#00C896; font-size:1.4rem; margin: 20px 0 4px 0;">📩 Pesan Baru Masuk!</h1>
                            <p style="color:#aaaaaa; font-size:.85rem; margin:0;">Seseorang menghubungimu melalui form kontak portfolio.</p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 36px 40px;">

                            <!-- Sender Info -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="background:#f9f9f9; border-radius:12px; padding:24px; margin-bottom:24px;">
                                <tr>
                                    <td style="padding-bottom:14px;">
                                        <span style="font-size:.7rem; font-weight:700; letter-spacing:2px; color:#00C896; text-transform:uppercase;">Pengirim</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" style="padding-bottom:10px; vertical-align:top;">
                                        <span style="font-size:.75rem; color:#999; display:block; margin-bottom:2px;">Nama Lengkap</span>
                                        <strong style="font-size:.95rem; color:#0D0D0D;">{{ $first_name }} {{ $last_name }}</strong>
                                    </td>
                                    <td width="50%" style="padding-bottom:10px; vertical-align:top;">
                                        <span style="font-size:.75rem; color:#999; display:block; margin-bottom:2px;">Alamat Email</span>
                                        <strong style="font-size:.95rem; color:#0D0D0D;">{{ $email }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <span style="font-size:.75rem; color:#999; display:block; margin-bottom:2px;">Subjek</span>
                                        <strong style="font-size:.95rem; color:#0D0D0D;">{{ $subject ?? '(tidak ada subjek)' }}</strong>
                                    </td>
                                </tr>
                            </table>

                            <!-- Message -->
                            <span style="font-size:.7rem; font-weight:700; letter-spacing:2px; color:#00C896; text-transform:uppercase; display:block; margin-bottom:12px;">Pesan</span>
                            <div style="background:#f9f9f9; border-left:4px solid #00C896; border-radius:0 12px 12px 0; padding:20px 24px; font-size:.92rem; color:#333; line-height:1.75;">
                                {{ $pesan }}
                            </div>

                            <!-- Reply Button -->
                            <div style="text-align:center; margin-top:32px;">
                                <a href="mailto:{{ $email }}" style="background:#0D0D0D; color:#ffffff; padding:13px 32px; border-radius:10px; text-decoration:none; font-weight:600; font-size:.9rem; display:inline-block;">
                                    Balas Pesan ↗
                                </a>
                            </div>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f5f5f5; padding:20px 40px; border-top:1px solid #ebebeb;">
                            <p style="font-size:.78rem; color:#999; margin:0; text-align:center;">
                                Email ini dikirim otomatis dari form kontak portfolio
                                <a href="#" style="color:#00C896; text-decoration:none;">alfikar-radestian</a>
                                &nbsp;·&nbsp; © {{ date('Y') }}
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
