<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use App\Models\Menu\Menu_m;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $model = Menu_m::with('tenant')->get();

        if(request()->ajax())
        {
            $model = Menu_m::with('tenant')->get();

            return DataTables::of($model)
                    ->addColumn('action', function($tipe)
                        {
                            $button = "<div class='d-flex gap-3 align-center'>";

                            $button .= "<a href='javascript:void(0);' name='edit' id=' ". $tipe->id ." ' class='button text-success'><i class='mdi mdi-pencil font-size-18'></i></a>";

                            $button .= "<a href='javascript:void(0);' name='delete' id='" . $tipe->id ."' class='button text-danger'><i class='mdi mdi-delete font-size-18'></i></a>";

                            $button .= "</div>";

                            return $button;
                        })
                    ->addColumn('detail', function($tipe)
                    {
                        $button = '<button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" id="detail">
                                                    View Details
                                    </button>';
                        return $button;
                    })
                    ->rawColumns(['action', 'detail'])
                    ->make(true);
        }

        return view('pages.v2.Dashboard.Menu.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $find_code = Menu_m::max('kode_menu');

        if($find_code)
        {
            $value_code = substr($find_code,13);
            $code = (int) $value_code;
            $code = $code + 1;
            $return_value = "TELU/MENU/".str_pad($code,4,"0",STR_PAD_LEFT);
        }else{
            $return_value = "TELU/MENU/0001";
        }


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

        $model = Menu_m::with('tenant')->where('id', $id)->get();

        return response()->json($model);
    }

}
