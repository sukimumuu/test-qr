<?php

namespace App\Http\Controllers;

use App\Models\User;
use Midtrans\Config;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
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

        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => Str::uuid(),
                'gross_amount' => 150000,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'email' => $request->email,
            ),
        );

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $params);
        $response = json_decode($response->body());
        $payment = new Payment;
        $payment->order_id = $params['transaction_details']['order_id'];
        $payment->status = 'Pending';
        $payment->price = 150000;
        $payment->name = $request->name;
        $payment->email = $request->email;
        $payment->payment_link = $response->redirect_url;
        $payment->save();

        Mail::send('emails.qrcode', ['user' => $user], function ($message) use ($user, $qrCodePath) {
            $message->to($user->email);
            $message->subject('Your Registration QR Code');
            $message->attach($qrCodePath);
        });

        return redirect($response->redirect_url);
    }

    public function webhook(Request $request){
        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));
         $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->get("https://api.sandbox.midtrans.com/v2/$request->order_id/status");
        $response = json_decode($response->body());

        $payment = Payment::where('order_id', $response->order_id)->firstOrFail();

        if($payment->status === 'settlement' || $payment->status === 'capture'){
            return response()->json('Pembayaran sudah terproses');
        }

        if($response->transaction_status === 'capture'){
            $payment->status = 'capture';
        } else if($response->transaction_status === 'settlement'){
            $payment->status = 'settlement';
        } else if($response->transaction_status === 'pending'){
            $payment->status = 'pending';
        } else if($response->transaction_status === 'deny'){
            $payment->status = 'deny';
        } else if($response->transaction_status === 'expire'){
            $payment->status = 'expire';
        } else if($response->transaction_status === 'cancel'){
            $payment->status = 'cancel';
        }
        $payment->save();
        return response()->json('berhasil');

    }

    public function form(){
        return view('admin.formFunRun');
    }

    public function hasilScan(){
        return view('admin.hasilScan');
    }

    public function pembayaranBerhasil(){
        return view('admin.pembayaranBerhasil');
    }

    public function pembayaranGagal(){
        return view('admin.pembayaranGagal');
    }
}
