<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\transaction\Transaction_m;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction_pending = Transaction_m::where('status', 'PENDING')->count();
        $total_transaction = Transaction_m::all()->count();
        $date = date('Y-m-d');
        
        $transaction_day = Transaction_m::whereDate('created_at' , '=', $date)
                                            ->where('status', 'SUCCESS')
                                            ->count();
        $transaksi_sukses = Transaction_m::where('status', 'SUCCESS')->count();

        if(request()->ajax())
        {
            $model = Transaction_m::with('menu')->latest()->get();


            return DataTables::of($model)
                        ->addColumn('action', function($tipe)
                        {
                            $button = "<div class='d-flex gap-3 align-center'>";

                            $button .= "<a href='javascript:void(0);' name='edit' id=' ". $tipe->id ." ' class='button text-success'><i class='mdi mdi-pencil font-size-18'></i></a>";

                            $button .= "<a href='javascript:void(0);' name='delete' id='" . $tipe->id ."' class='button text-danger'><i class='mdi mdi-delete font-size-18'></i></a>";

                            $button .= "</div>";

                            return $button;
                        })
                        ->addColumn('status_order', function($tipe)
                        {
                            if($tipe->status === 'PENDING')
                            {
                                $status = '<span class="badge badge-pill badge-soft-warning font-size-11">' . $tipe->status  . '</span>';

                            }else{
                                $status = '<span class="badge badge-pill badge-soft-success font-size-11">' . $tipe->status  . '</span>';
                            }

                            return $status;
                        })
                        ->addColumn('detail', function($tipe)
                        {
                            $button = '<button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" id="detail">
                                                        View Details
                                        </button>';
                            return $button;
                        })
                    ->rawColumns(['action', 'status_order', 'detail'])
                    ->make(true);
        }

        return view('pages.v2.Dashboard.Transaction.index', compact('transaksi_sukses','transaction_pending','total_transaction','transaction_day'));
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

    public function view(Request $request)
    {
        $id = $request->input('id');

        $model = Transaction_m::with(['tenant', 'menu'])->where('id', $id)->first();

        return response()->json($model);
    }
}
