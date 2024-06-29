<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $qrCode = QrCode::format('png')->generate($user->email);
        $qrCodePath = public_path('qrcodes/' . $user->id . '.png');
        file_put_contents($qrCodePath, $qrCode);

        Mail::send('emails.qrcode', ['user' => $user], function ($message) use ($user, $qrCodePath) {
            $message->to($user->email);
            $message->subject('Your Registration QR Code');
            $message->attach($qrCodePath);
        });

        return response()->json(['message' => 'User registered and QR code sent to email.']);
    }

    public function form(){
        return view('admin.formFunRun');
    }
}
