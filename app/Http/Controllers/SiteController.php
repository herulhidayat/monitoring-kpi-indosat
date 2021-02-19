<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use DataTables;
use Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
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
            $data = Site::select('*');
        }else{
            $data = Site::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(Site $site){
                        $user = Auth::user();
                        if($user->role == 'Admin'){
                            $btn = '<a type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bd-example-modal-xl" style="height: 30px; width: 30px"'.$site->id.'"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">create</i></a> <a type="button" class="btn btn-warning btn-xs" style="height: 30px; width: 30px" href="/site-data/delete/'.$site->id.'"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">delete</i></a>';
                        }else{
                            $btn = '<a type="button" class="btn btn-warning btn-xs" style="height: 30px; width: 30px" href="/site-data/edit/'.$site->id.'"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">create</i></a>';
                        }   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->toJson();
        }

        return view('pages.site-data');
    }

    public function siteTransaction(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = Site::select('*');
        }else{
            $data = Site::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->editColumn('revenue', function (Site $site) {
                        return number_format(round($site->revenue),0,"",".");
                    })
                    ->editColumn('gap_revenue', function (Site $site) {
                        return number_format(round($site->gap_revenue),0,"",".");
                    })
                    ->toJson();
        }

        return view('pages.site-transaction');
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
}
