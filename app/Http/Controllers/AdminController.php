<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function verifyQrCode(Request $request)
    {
        // Log request data
        Log::info('QR Code Data: ' . $request->qr_code);

        $user = User::where('email', $request->qr_code)->first();

        if ($user) {
            return response()->json([
                'message' => 'User is registered: ' . $user->name,
                'user' => $user
            ]);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
