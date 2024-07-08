<?php

namespace App\Http\Controllers;

use Log;
use Midtrans\Snap;
use App\Models\User;
use Midtrans\Config;
use App\GenerateRandom;
use App\Models\Payment;
use App\Models\Regency;
use App\Models\District;
use App\Models\Province;
use Midtrans\Notification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegistrationController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|min:6',
            'gender' => 'required',
            'domisili' => 'required',
            'distrik' => 'required',
            'kecamatan' => 'required',
            'size' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'phone_urgent' => 'required',
            'contant_urgent' => 'required',
            'community' => 'required',
            'name_community' => 'required',
        ]);

        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
        }
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
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
            'age' => $request->age,
            'status' => 'pending',
            'phone_urgent' => $request->phone_urgent,
            'contant_urgent' => $request->contant_urgent,
            'relation_urgent' => $request->relation_urgent,
            'community' => $request->community,
            'name_community' => $request->name_community,
            'participant_number' => $newNumber,
            'kode_pay' => $params['transaction_details']['order_id'],
            'password' => Hash::make($request->password),
        ]);
        $snapToken = Snap::getSnapToken($params);
        return view('pembayaran', ['snapToken' => $snapToken]);
    }


    public function form(){
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        return view('admin.formFunRun', compact('provinces','regencies','districts'));
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

    public function paymentHandler(Request $request){
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.env('MIDTRANS_SERVER_KEY')); 
        if($hashed == $request->signature_key){
        if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
                $user = User::where('kode_pay', $request->order_id)->first();
                $user->update(['status'=>'settlement']);
                // Kirim email ke user
                $qrCode = QrCode::format('png')->size(300)->generate($user->tokens_account);
                $qrCodePath = public_path('qrcodes/' . $user->id . '.png');
                file_put_contents($qrCodePath, $qrCode);
                // Send the email with the QR code attachment
                Mail::send('emails.qrcode', ['user' => $user], function ($message) use ($user, $qrCodePath) {
                    $message->to($user->email);
                    $message->subject('Your Registration QR Code');
            });
        } else if ($request->transaction_status == 'cancel' || $request->transaction_status == 'deny' || $request->transaction_status == 'expire') {
            return "Pembayaran Gagal !";
        }
        }
    }


    public function alphaReg(Request $request){
        $validator = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);
        $user = User::create([
            'email' => $validator['email'],
            'password' => Hash::make($validator['password'])
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('verification.notice');
    }
}
