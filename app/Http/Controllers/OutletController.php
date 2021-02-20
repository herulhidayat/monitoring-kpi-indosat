<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use DataTables;
use Auth;
use Illuminate\Support\Facades\DB;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = Outlet::select('*');
        }else{
            $data = Outlet::where('username', $user->username)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(Outlet $outlet){
                        $user = Auth::user();
                        if($user->role == 'Admin'){
                            $btn = '
                                    <a type="button" class="btn btn-warning btn-xs" href="javascript:void(0);" data-toggle="modal" data-target="#editModal'.$outlet->id.'" style="height: 30px; width: 30px"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">create</i></a> 
                                    <a type="button" class="delete_outlet btn btn-danger btn-xs" style="height: 30px; width: 30px" data-id="'.$outlet->id.'" data-url="/outlet-data/delete/'.$outlet->id.'"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">delete</i></a>';
                        }else{
                            $btn = '<a type="button" class="delete_outlet btn btn-danger btn-xs" style="height: 30px; width: 30px" data-id="'.$outlet->id.'" data-url="/outlet-data/delete/'.$outlet->id.'"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">delete</i></a>';
                        }   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->toJson();
        }


        return view('pages.outlet-data');
    }

    public function outletTransaction(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = Outlet::select('*');
        }else{
            $data = Outlet::where('username', $user->username)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->editColumn('balance', function (Outlet $outlet) {
                        return number_format(round($outlet->balance),0,"",".");
                    })
                    ->editColumn('mobo_transaction', function (Outlet $outlet) {
                        return number_format(round($outlet->mobo_transaction),0,"",".");
                    })
                    ->editColumn('sultan_target', function (Outlet $outlet) {
                        return number_format(round($outlet->sultan_target),0,"",".");
                    })
                    ->editColumn('sultan_ach', function (Outlet $outlet) {
                        return number_format(round($outlet->sultan_ach),0,"",".");
                    })
                    ->editColumn('jawara_target', function (Outlet $outlet) {
                        return number_format(round($outlet->jawara_target),0,"",".");
                    })
                    ->editColumn('jawara_ach', function (Outlet $outlet) {
                        return number_format(round($outlet->jawara_ach),0,"",".");
                    })
                    ->editColumn('sultan_percen', function (Outlet $outlet) {
                        return number_format($outlet->sultan_percen*100,1)." %";
                    })
                    ->editColumn('jawara_percen', function (Outlet $outlet) {
                        return number_format($outlet->jawara_percen*100,1)." %";
                    })
                    ->toJson();
        }

        return view('pages.outlet-transaction');
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
        Outlet::find($id)->delete();
    }
}
