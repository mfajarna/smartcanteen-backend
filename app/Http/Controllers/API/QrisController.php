<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class QrisController extends Controller
{
    public function postJsonFromQris(Request $request)
    {

        try{
            $rawPostData = file_get_contents("php://input");

            $decode = json_decode($rawPostData);
            
            return ResponseFormatter::success($decode, 'Success post data');

        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Something went wrong');
        }
    }
}
