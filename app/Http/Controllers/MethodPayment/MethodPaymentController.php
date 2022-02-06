<?php

namespace App\Http\Controllers\MethodPayment;

use App\Http\Controllers\Controller;
use App\Models\Balance\UserBalance;
use App\Models\HistoryDeposit;
use Illuminate\Http\Request;

class MethodPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.v2.Dashboard.MethodPayment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function testing()
    {
        $va           = '0000001388669869'; //get on iPaymu dashboard
        $secret       = 'SANDBOX88721AAF-CAA9-49AC-875A-914661206495-20220128174713'; //get on iPaymu dashboard
    
        $url          = 'https://sandbox.ipaymu.com/api/v2/payment/direct'; //url
        $method       = 'POST'; //method

        
        $body['name'] = "kojay";
        $body['phone'] = "08138232";
        $body['email'] = "invasionfajar@gmail.com";
        $body['amount'] = "100000";

        $body['paymentMethod']  = "qris";
        $body['paymentChannel']  = 'linkaja';

        $body['notifyUrl']  = 'https://mywebsite.com/notify';

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


        return $res['Data'];

    }

    public function notify(Request $request)
    {

        $trx_id = $request->trx_id;
        $status = $request->status;
   
        $model = HistoryDeposit::where('trx_id', $trx_id)->first();

        if($model)
        {
            if($status == "berhasil"){

               

                $user_id = $model['user_id'];
                $nominal_deposit = $model['nominal_deposit'];

                

                $user_balance = UserBalance::where('user_id',$user_id)->first();

               

                if($user_balance)
                {
                    $saldo = $user_balance['balanced'];

                    $user_balance->balanced = $saldo + $nominal_deposit;
                    $user_balance->save();

                    $model->status = 1;
                    $model->save();

                    return response()->json("berhasil update amount");
                }else{
                    $user = new UserBalance;
                    $user->user_id = $user_id;
                    $user->balanced = $nominal_deposit;
                    $user->save();

                    $model->status = 1;
                    $model->save();

                    return response()->json("berhasil membuat data saldo!");
                }

            }else{
                return response()->json("gagal");
            }
        }

        
        
    }
}
