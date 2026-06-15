<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Form Kontak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid #e1e5eb;
        }
        .email-header {
            background-color: #4f46e5; /* Warna ungu/biru modern */
            color: #ffffff;
            padding: 25px;
            text-align: center;
        }
        .email-header h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
        }
        .email-body {
            padding: 30px;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        .meta-table td {
            padding: 10px 0;
            border-bottom: 1px solid #f0f2f5;
            vertical-align: top;
        }
        .meta-label {
            font-weight: bold;
            color: #4b5563;
            width: 30%;
            font-size: 14px;
        }
        .meta-value {
            color: #1f2937;
            width: 70%;
            font-size: 14px;
        }
        .message-box {
            background-color: #f8fafc;
            border-left: 4px solid #4f46e5;
            padding: 15px;
            border-radius: 0 4px 4px 0;
            margin-top: 5px;
        }
        .message-title {
            font-weight: bold;
            color: #374151;
            font-size: 14px;
            margin-bottom: 8px;
        }
        .message-text {
            color: #4b5563;
            font-size: 14px;
            line-height: 1.6;
            white-space: pre-line; /* Menjaga enter/spasi dari user */
        }
        .email-footer {
            background-color: #f8fafc;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
            border-top: 1px solid #e1e5eb;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <div class="email-header">
            <h2>Pesan Baru dari Kontak Website</h2>
        </div>

        <div class="email-body">
            <table class="meta-table">
                <tr>
                    <td class="meta-label">Nama Pengirim</td>
                    <td class="meta-value">: Alfikar Jumat</td>
                </tr>
                <tr>
                    <td class="meta-label">Email</td>
                    <td class="meta-value">: <a href="mailto:ohong02@gmail.com" style="color: #4f46e5; text-decoration: none;">ohong02@gmail.com</a></td>
                </tr>
                <tr>
                    <td class="meta-label">Subjek</td>
                    <td class="meta-value">: Diskusi</td>
                </tr>
            </table>

            <div class="message-title">Isi Pesan:</div>
            <div class="message-box">
                <div class="message-text">Jsbsisis</div>
            </div>
        </div>

        <div class="email-footer">
            Email ini dikirim secara otomatis oleh sistem form kontak website Anda.
        </div>
    </div>

</body>
</html>