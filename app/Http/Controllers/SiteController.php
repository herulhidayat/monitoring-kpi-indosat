<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use DataTables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
            $data = Site::select('*')->get();
        }else{
            $data = Site::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(Site $site){
                        $user = Auth::user();
                        if($user->role == 'Admin'){
                            $btn = '
                                    <a type="button" class="edit_site btn btn-warning btn-xs" href="javascript:void(0);" data-id="'.$site->id.'" data-surrounding="'.$site->outlet_surrounding.'" data-ono="'.$site->ono.'" data-total="'.$site->total_outlet.'" data-uro="'.$site->uro.'" data-sso="'.$site->sso.'" data-quro="'.$site->quro.'" data-qsso="'.$site->qsso.'" data-revenue="'.$site->revenue.'" data-gap="'.$site->gap_revenue.'" style="height: 30px; width: 30px"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">create</i></a> 
                                    <a type="button" class="delete_site btn btn-danger btn-xs" style="height: 30px; width: 30px" data-id="'.$site->id.'" data-url="/site-data/delete/'.$site->id.'"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">delete</i></a>';
                        }else{
                            $btn = '<a type="button" class="edit_site btn btn-warning btn-xs" href="javascript:void(0);" data-id="'.$site->id.'" data-surrounding="'.$site->outlet_surrounding.'" data-ono="'.$site->ono.'" data-total="'.$site->total_outlet.'" data-uro="'.$site->uro.'" data-sso="'.$site->sso.'" data-quro="'.$site->quro.'" data-qsso="'.$site->qsso.'" data-revenue="'.$site->revenue.'" data-gap="'.$site->gap_revenue.'" style="height: 30px; width: 30px"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">create</i></a>';
                        }   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->toJson();
        }

        return view('pages.site-data', [
            'data_site'         => $data,
            ]);
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
        $data = Site::where('id', $id);
        $data->update([
            'gap_revenue'   => $request->gap_revenue,
            'revenue'       => $request->revenue,
            'qsso'          => $request->qsso,
            'quro'          => $request->quro,
            'sso'           => $request->sso,
            'uro'           => $request->uro,
            'total_outlet'  => $request->total_outlet,
            'ono'           => $request->ono,
            'outlet_surrounding'    => $request->outlet_surrounding,
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
        Site::find($id)->delete();
    }
}
