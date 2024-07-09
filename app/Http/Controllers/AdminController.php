<?php

namespace App\Http\Controllers;

use Log;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function verifyQrCode(Request $request)
    {
        // Log request data
        Log::info('QR Code Data: ' . $request->qr_code);

        $user = User::where('tokens_account', $request->qr_code)->first();
        $nowInJakarta = Carbon::now('Asia/Jakarta');
        $date = Carbon::createFromFormat('Y-m-d H:i:s', '2024-07-02 12:00:00', 'Asia/Jakarta');
        if ($user->verification_admin == NULL) {
            $user->verification_admin = $nowInJakarta->toDateTimeString();
            $user->save();
            return response()->json([
                'message' => 'User is registered: ' . $user->name,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'message' => "User sudah diverifikasi! \n Akun diverifikasi tanggal ". $user->verification_admin,
            ], 404);
        }
        
        return response()->json(['message' => 'User tidak ditemukan !'], 404);
    }
}
