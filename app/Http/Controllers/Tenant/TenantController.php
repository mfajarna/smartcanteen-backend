<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Tenant_m;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $model = Tenant_m::all();

            return DataTables::of($model)
                    ->addColumn('action', function($tipe)
                        {
                            $button = "<div class='d-flex gap-3 align-center'>";

                            $button .= "<a href='javascript:void(0);' name='edit' id=' ". $tipe->id ." ' class='button text-success'><i class='mdi mdi-pencil font-size-18'></i></a>";

                            $button .= "<a href='javascript:void(0);' name='delete' id='" . $tipe->id ."' class='button text-danger'><i class='mdi mdi-delete font-size-18'></i></a>";

                            $button .= "</div>";

                            return $button;
                        })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('pages.v2.Dashboard.Tenant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenant.create');
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

        $model = Tenant_m::findOrfail($id);

        return response()->json($model);
    }
}
