<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\DumpQris_m;
use App\Models\transaction\Transaction_m;
use App\Models\UserApk\UserApk;

class QrisController extends Controller
{
    public function postJsonFromQris(Request $request)
    {

        try{
            $rawPostData = file_get_contents("php://input");

            $decode = json_decode($rawPostData);
            $status = $decode->status;

            // $model = new DumpQris_m();
            // $model->type = $decode->type;
            // $model->status = $decode->status;
            // $model->datetime = $decode->datetime;
            // $model->merchant_id = $decode->merchant_id;
            // $model->reference_label = $decode->reference_label;
            // $model->invoice_no = $decode->invoice_no;
            // $model->amount = $decode->amount;
            // $model->mdr = $decode->mdr;
            // $model->issue_name = $decode->issuer_name;
            // $model->customer_name = $decode->customer_name;
            // $model->store_label = $decode->store_label;
            // $model->terminal_label = $decode->terminal_label;
            // $model->save();



            // Adding update status field to transactions
            // $modelTransactions = Transaction_m::where('total_order', $decode->amount)
            //                                     ->where('status', 'PENDING')
            //                                     ->update([
            //                                         'status_pembayaran_qris' => $status
            //                                     ]);

            // Collection Transactions by total order
            $transactions = Transaction_m::where('total_order', $decode->amount)
            ->where('status', 'PENDING')
            ->first();

            dd($transactions);
            
            // get id user from transactions table
            $id_user = $transactions->id_user;
            
            // get kode_transaksi from transactions table
            $kode_transaksi = $transactions->kode_transaksi;

            // Collection User APK
            $user_apk = UserApk::findOrFail($id_user);

            // Find Device Token from User APK Table
            $device_token = $user_apk->device_token;


            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
            "to": '.$device_token.',
            
                "data" : {
                    "type" : "Setting"
                },
                "collapse_key": "type_a",
                "priority" : "high",
                "notification":{
                    "android_channel_id": "default-channel-id",
                    "title": "Notifikasi Pembayaran QRIS SmartCanteen",
                    "body": "Pesanan dengan kode transaksi: ' .$kode_transaksi. ', status pembayaran qris: '. $status .' "
                }



            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: key=AAAAmc0dakQ:APA91bECUaR9WbE_tTHJkSJ2KlcYbGThlF-h8RoQDAdgZerbZPIkbV3UKsn1Pg-Nto24LAd32cerbsf8JZQ7lUbfzFV7GxgocRSZNkA18ksUiLZoDWHZmhDB_HPKB8Vh2mWXd-cvelH0',
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);
            echo $response;

            curl_close($curl);
                                                

            if($model && $modelTransactions && $response)
            {
                return ResponseFormatter::success(["Data" => $model, "Transaction" => $modelTransactions], 'Success save dump qris data');
            }
            else{
                return ResponseFormatter::error("oops data tidak ada",'Failed to save dump qris data');
            }
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Something went wrong');
        }
    }

    public function getDumpQris(Request $request)
    {
        try{
            $invoice_no = $request->invoice_no;
            $status = $request->status;

            $model = DumpQris_m::all();

            if($invoice_no)
            {
                $model = DumpQris_m::where('invoice_no', $invoice_no)->get();
            }

            if($status)
            {
                $model = DumpQris_m::where('status', $status)->get();
            }

            if($model)
            {
                return ResponseFormatter::success($model, 'Success get data dump data qris');
            }else{
                return ResponseFormatter::error("oops",'Failed to save dump qris data');
            }
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Something went wrong');
        }
    }
}
