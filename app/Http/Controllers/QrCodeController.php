<?php

namespace App\Http\Controllers;

use Zxing\QrReader;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function scan(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'qr_code' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil file yang diupload
        $image = $request->file('qr_code');
        $imagePath = $image->getPathname();

        // Memindai QR code
        $qrcode = new QrReader($imagePath);
        $text = $qrcode->text();

        // Kembalikan hasil pemindaian
        return response()->json([
            'result' => $text,
        ]);
    }
}
