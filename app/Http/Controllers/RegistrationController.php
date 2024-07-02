<?php

namespace App\Http\Controllers;

use Log;
use Midtrans\Snap;
use App\Models\User;
use Midtrans\Config;
use App\GenerateRandom;
use App\Models\Payment;
use Midtrans\Notification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'gender' => 'required',
            'domisili' => 'required',
            'distrik' => 'required',
            'kecamatan' => 'required',
            'size' => 'required',
        ]);

        if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
        }
        $numberRand = new GenerateRandom();
        $tokenAcc = $numberRand->generateRandomString(10);
        $cekParticipant = User::orderBy('participant_number', 'desc')->first();
        if($cekParticipant){
            $lastNumber = intval($cekParticipant->participant_number);
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'domisili' => $request->domisili,
            'distrik' => $request->distrik,
            'kecamatan' => $request->kecamatan,
            'phone' => $request->phone,
            'size' => $request->size,
            'tokens_account' => $tokenAcc,
            'participant_number' => $newNumber,
            'password' => Hash::make($request->password),
        ]);

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


        $qrCode = QrCode::format('png')
                         ->size(300)
                         ->generate($user->tokens_account);

        $qrCodePath = public_path('qrcodes/' . $user->id . '.png');
        Log::info('Saving QR Code to: ' . $qrCodePath);

        // Save the QR code to the specified path
        file_put_contents($qrCodePath, $qrCode);

        // Check if file was created
        if (file_exists($qrCodePath)) {
            Log::info('QR Code file created: ' . $qrCodePath);
        } else {
            Log::error('QR Code file not created.');
        }

        // Send the email with the QR code attachment
        Mail::send('emails.qrcode', ['user' => $user], function ($message) use ($user, $qrCodePath) {
            $message->to($user->email);
            $message->subject('Your Registration QR Code');

            // Check if the file exists before attaching
            if (file_exists($qrCodePath)) {
                Log::info('Attaching QR Code to email: ' . $qrCodePath);
                $message->attach($qrCodePath);
            } else {
                Log::error('QR Code file not found: ' . $qrCodePath);
            }
        });

        return redirect($response->redirect_url);
    }


    public function form(){
        return view('admin.formFunRun');
    }

    public function hasilScan($id){
        $user = User::find($id);
        return view('admin.hasilScan', compact('user'));
    }

    public function registrationSuccess(){
        return view('admin.pembayaranBerhasil');
    }

    public function registrationFailed(){
        return view('admin.pembayaranGagal');
    }
}
