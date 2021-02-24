<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rencana;
use App\Models\User;
use DataTables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class RencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $now = carbon::now();
        $user = Auth::user();

        if($user->role == 'Admin'){
            $data = Rencana::join('users as spv', 'rencana.user_id', '=', 'spv.id')
                    ->join('users as cso', 'rencana.cso_id', '=', 'cso.id')
                    ->where('status', '=', 'Belum Selesai')
                    ->whereDate('rencana_end', '>=', $now->toDateString())
                    ->select('rencana.*', 'spv.name as nama_spv', 'cso.username as nama_cso')
                    ->get();
        }elseif($user->role == 'SPV'){
            $data = Rencana::join('users as cso', 'rencana.cso_id', '=', 'cso.id')
                    ->where('user_id', $user->id)
                    ->where('status', '=', 'Belum Selesai')
                    ->whereDate('rencana_end', '>=', $now->toDateString())
                    ->select('rencana.*', 'cso.username as nama_cso')
                    ->get();
        }else{
            $data = Rencana::join('users as spv', 'rencana.user_id', '=', 'spv.id')
                    ->join('users as cso', 'rencana.cso_id', '=', 'cso.id')
                    ->where('cso_id', $user->id)
                    ->where('status', '=', 'Belum Selesai')
                    ->whereDate('rencana_end', '>=', $now->toDateString())
                    ->select('rencana.*', 'spv.name as nama_spv', 'cso.username as nama_cso')
                    ->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(Rencana $rencana){
                        $btn = '
                                <a type="button" class="edit_rencana btn btn-warning btn-xs" href="javascript:void(0);" data-id="'.$rencana->id.'" data-judul="'.$rencana->judul.'" data-isi="'.$rencana->isi.'" data-end="'.$rencana->rencana_end.'" style="height: 30px; width: 30px"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">create</i></a> 
                                <a type="button" class="delete_rencana btn btn-danger btn-xs" style="height: 30px; width: 30px" data-id="'.$rencana->id.'" data-url="/rencana/delete/'.$rencana->id.'"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">delete</i></a>';
                        return $btn;
                    })
                    ->addColumn('konfirmasi', function(Rencana $rencana){
                        $btn = '
                                <a type="button" class="check_rencana btn btn-warning btn-xst" href="javascript:void(0);" data-id="'.$rencana->id.'"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">done</i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'konfirmasi'])
                    ->toJson();
        }
        
        return view('pages.rencana-aktif', [
                'data_rencana'         => $data,
            ]);
    }

    public function selesai(Request $request)
    {
        $now = carbon::now();
        $user = Auth::user();

        if($user->role == 'Admin'){
            $data = Rencana::join('users as spv', 'rencana.user_id', '=', 'spv.id')
                    ->join('users as cso', 'rencana.cso_id', '=', 'cso.id')
                    ->whereDate('rencana_end', '<', $now->toDateString())
                    ->Orwhere('status', '!=', 'Belum Selesai')
                    ->select('rencana.*', 'spv.name as nama_spv', 'cso.username as nama_cso')
                    ->get();
        }elseif($user->role == 'SPV'){
            $data = Rencana::join('users as cso', 'rencana.cso_id', '=', 'cso.id')
                    ->where('user_id', $user->id)
                    ->whereDate('rencana_end', '<', $now->toDateString())
                    ->Orwhere('status', '!=', 'Belum Selesai')
                    ->select('rencana.*', 'cso.username as nama_cso')
                    ->get();
        }else{
            $data = Rencana::join('users as spv', 'rencana.user_id', '=', 'spv.id')
                    ->join('users as cso', 'rencana.cso_id', '=', 'cso.id')
                    ->where('cso_id', $user->id)
                    ->whereDate('rencana_end', '<', $now->toDateString())
                    ->Orwhere('status', '!=', 'Belum Selesai')
                    ->select('rencana.*', 'spv.name as nama_spv', 'cso.username as nama_cso')
                    ->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(Rencana $rencana){
                        $btn = '
                                <a type="button" class="delete_rencana btn btn-danger btn-xs" style="height: 30px; width: 30px" data-id="'.$rencana->id.'" data-url="/rencana/delete/'.$rencana->id.'"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">delete</i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->toJson();
        }

        return view('pages.rencana-selesai', [
                'data_rencana'         => $data,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = User::where('role', '=', 'CSO')->get();
        }else{
            $data = User::where('role', '=', 'CSO')->where('micro_cluster_user', $user->micro_cluster_user)->get();
        }

        return view('pages.rencana-buat', [
            'data_cso'        => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = carbon::now();
        $user = Auth::user();
        if($request->cso !== null){
            foreach($request->cso as $data){
                $rencana            = new Rencana;
                $rencana->user_id   = $user->id;
                $rencana->cso_id    = $data;
                $rencana->judul     = $request->judul;
                $rencana->isi       = $request->isi;
                $rencana->rencana_start = $now->toDateString();
                $rencana->rencana_end   = $request->rencana_end;
                $rencana->status        = 'Belum Selesai';
                $rencana->save();
            }
        }
        return redirect()->route('rencana.create');
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
        $data = Rencana::where('id', $id);
        $data->update([
            'judul'       => $request->judul,
            'isi'  => $request->isi,
            'rencana_end' => $request->rencana_end,
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
        Rencana::find($id)->delete();
    }

    public function done(Request $request, $id)
    {
        $data = Rencana::where('id', $id);
        $data->update([
            'keterangan'    => $request->ket,
            'status'        => 'Selesai',
        ]);
    }
}
