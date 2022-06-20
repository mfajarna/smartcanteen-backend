<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\DumpQris_m;
use App\Models\transaction\Transaction_m;

class QrisController extends Controller
{
    public function postJsonFromQris(Request $request)
    {

        try{
            $rawPostData = file_get_contents("php://input");

            $decode = json_decode($rawPostData);

            $model = new DumpQris_m();
            $model->type = $decode->type;
            $model->status = $decode->status;
            $model->datetime = $decode->datetime;
            $model->merchant_id = $decode->merchant_id;
            $model->reference_label = $decode->reference_label;
            $model->invoice_no = $decode->invoice_no;
            $model->amount = $decode->amount;
            $model->mdr = $decode->mdr;
            $model->issue_name = $decode->issuer_name;
            $model->customer_name = $decode->customer_name;
            $model->store_label = $decode->store_label;
            $model->terminal_label = $decode->terminal_label;
            $model->save();

            $modelTransactions = Transaction_m::where('total', $decode->amount)
                                                ->where('status', 'PENDING')
                                                ->update(['status' => $decode->status]);

            

            if($model && $modelTransactions)
            {
                return ResponseFormatter::success(["Data" => $model, "Transaction" => $modelTransactions], 'Success save dump qris data');
            }
            else{
                return ResponseFormatter::error("oops",'Failed to save dump qris data');
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
