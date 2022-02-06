<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\HistoryDeposit;
use App\Models\PaymentMethod;
use Exception;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function create(Request $request)
    {
        try{
            $nominal_deposit = $request->input('nominal_deposit');
            $payment_name = $request->input('payment_name');

            $user_id = $request->input('user_id');
            $nama_user = $request->input('nama_user');
            $phone = $request->input('phoneNumber');
            $email = $request->input('email');
    
            $payment_name = PaymentMethod::where('name', '=', $payment_name)->first();
            $payment_method_id = $payment_name->id;
            $payment_method = $payment_name->payment_method;
            $payment_chanel = $payment_name->payment_channel;
    
            $va           = '0000001388669869'; //get on iPaymu dashboard
            $secret       = 'SANDBOX88721AAF-CAA9-49AC-875A-914661206495-20220128174713'; //get on iPaymu dashboard
        
            $url          = 'https://sandbox.ipaymu.com/api/v2/payment/direct'; //url
            $method       = 'POST'; //method
    
            
            $body['name'] = $nama_user;
            $body['phone'] = $phone;
            $body['email'] = $email;
            $body['amount'] = $nominal_deposit;

            $body['paymentMethod']  = $payment_method;
            $body['paymentChannel']  = $payment_chanel;

            $link_notif = 'http://27.112.78.169/notify/';

            $body['notifyUrl']  = $link_notif;
            
    
            //End Request Body//
        
            //Generate Signature
            // *Don't change this
            $jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
            $requestBody  = strtolower(hash('sha256', $jsonBody));
            $stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
            $signature    = hash_hmac('sha256', $stringToSign, $secret);
            $timestamp    = Date('YmdHis');
            //End Generate Signature
    
            $ch = curl_init($url);
        
            $headers = array(
                'Accept: application/json',
                'Content-Type: application/json',
                'va: ' . $va,
                'signature: ' . $signature,
                'timestamp: ' . $timestamp
            );
    
    
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
            curl_setopt($ch, CURLOPT_POST, count($body));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);
        
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $err = curl_error($ch);
            $ret = curl_exec($ch);
            curl_close($ch);

            $res = json_decode($ret, true);

            
            $model_deposit = new HistoryDeposit;
            $model_deposit->user_id = $user_id;
            $model_deposit->nominal_deposit = $nominal_deposit;
            $model_deposit->payment_id = $payment_method_id;
            $model_deposit->payment_no = $res['Data']['PaymentNo'];
            $model_deposit->payment_name = $res['Data']['PaymentName'];
            $model_deposit->trx_id = $res['Data']['TransactionId'];
            $model_deposit->expired = $res['Data']['Expired'];
            
            $model_deposit->save();

            return ResponseFormatter::success($res, 'Berhasil ambil Data Menu');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Something went wrong');
        }
    }
}
