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
            $data = Outlet::select('*')->get();
        }elseif($user->role == 'SPV'){
            $data = Outlet::where('micro_cluster', $user->micro_cluster_user)->get();
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
                                    <a type="button" class="edit_outlet btn btn-warning btn-xs" data-id="'.$outlet->id.'" data-balance="'.$outlet->balance.'" data-mobo="'.$outlet->mobo_transaction.'" data-starget="'.$outlet->sultan_target.'" data-sach="'.$outlet->sultan_ach.'" data-spercen="'.$outlet->sultan_percen.'" data-jtarget="'.$outlet->jawara_target.'" data-jach="'.$outlet->jawara_ach.'" data-jpercen="'.$outlet->jawara_percen.'" href="javascript:void(0);" style="height: 30px; width: 30px"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">create</i></a> 
                                    <a type="button" class="delete_outlet btn btn-danger btn-xs" style="height: 30px; width: 30px" data-id="'.$outlet->id.'" data-url="/outlet-data/delete/'.$outlet->id.'"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">delete</i></a>';
                        }else{
                            $btn = '<a type="button" class="edit_outlet btn btn-warning btn-xs" data-id="'.$outlet->id.'" data-balance="'.$outlet->balance.'" data-mobo="'.$outlet->mobo_transaction.'" data-starget="'.$outlet->sultan_target.'" data-sach="'.$outlet->sultan_ach.'" data-spercen="'.$outlet->sultan_percen.'" data-jtarget="'.$outlet->jawara_target.'" data-jach="'.$outlet->jawara_ach.'" data-jpercen="'.$outlet->jawara_percen.'" href="javascript:void(0);" style="height: 30px; width: 30px"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">create</i></a>';
                        }   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->editColumn('balance', function (Outlet $outlet) {
                        return number_format(round($outlet->balance),0,"",".");
                    })
                    ->toJson();
        }


        return view('pages.outlet-data', [
            'data_outlet'         => $data,
            ]);
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
                    ->editColumn('mobo_transaction', function (Outlet $outlet) {
                        return number_format(round($outlet->mobo_transaction),0,"",".");
                    })
                    ->editColumn('mobo_daily', function (Outlet $outlet) {
                        return number_format(round($outlet->mobo_daily),0,"",".");
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
        $data = Outlet::where('id', $id);
        $data->update([
            'balance'       => $request->balance,
            'mobo_transaction'  => $request->mobo_transaction,
            'sultan_target' => $request->sultan_target,
            'sultan_ach'    => $request->sultan_ach,
            'sultan_percen' => $request->sultan_percen,
            'jawara_target' => $request->jawara_target,
            'jawara_ach'    => $request->jawara_ach,
            'jawara_percen' => $request->jawara_percen,
        ]);
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
