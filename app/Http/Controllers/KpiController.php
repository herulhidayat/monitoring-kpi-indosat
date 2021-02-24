<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kpi;
use App\Models\LastUpload;
use DataTables;
use Auth;
use Illuminate\Support\Facades\DB;

class KpiController extends Controller
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
            $data = Kpi::select('*');
        }else{
            $data = Kpi::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(Kpi $kpi){
                        $user = Auth::user();
                        if($user->role == 'Admin'){
                            $btn = '<a type="button" class="delete_kpi btn btn-danger btn-xs" style="height: 30px; width: 30px" data-id="'.$kpi->id.'" data-url="/kpi-data/delete/'.$kpi->id.'"><i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">delete</i></a>';
                        }else{
                            $btn = '';
                        }   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->editColumn('msa_nilai', function (Kpi $kpi) {
                        return number_format($kpi->msa_nilai*100,2)."%";
                    })
                    ->editColumn('omb_nilai', function (Kpi $kpi) {
                        return number_format($kpi->omb_nilai*100,2)."%";
                    })
                    ->editColumn('qsso_nilai', function (Kpi $kpi) {
                        return number_format($kpi->qsso_nilai*100,2)."%";
                    })
                    ->editColumn('quro_nilai', function (Kpi $kpi) {
                        return number_format($kpi->quro_nilai*100,2)."%";
                    })
                    ->editColumn('sc_nilai', function (Kpi $kpi) {
                        return number_format($kpi->sc_nilai*100,2)."%";
                    })
                    ->editColumn('ssohvc_nilai', function (Kpi $kpi) {
                        return number_format($kpi->ssohvc_nilai*100,2)."%";
                    })
                    ->editColumn('sqsso_nilai', function (Kpi $kpi) {
                        return number_format($kpi->sqsso_nilai*100,2)."%";
                    })
                    ->editColumn('ssc_nilai', function (Kpi $kpi) {
                        return number_format($kpi->ssc_nilai*100,2)."%";
                    })
                    ->editColumn('score', function (Kpi $kpi) {
                        return number_format($kpi->score*100,2)."%";
                    })
                    ->toJson();
        }

        $data_upload = LastUpload::where('kategori', 'kpi_outlet')->get();
        return view('pages.kpi-score', [
                'data_upload'         => $data_upload,
            ]);
    }

    public function msa(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = Kpi::select('*');
        }else{
            $data = Kpi::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->editColumn('msa_target', function (Kpi $kpi) {
                        return number_format(round($kpi->msa_target),0,"",".");
                    })
                    ->editColumn('msa_ach', function (Kpi $kpi) {
                        return number_format(round($kpi->msa_ach),0,"",".");
                    })
                    ->editColumn('msa_gap', function (Kpi $kpi) {
                        return number_format(round($kpi->msa_gap),0,"",".");
                    })
                    ->editColumn('msa_percen', function (Kpi $kpi) {
                        return number_format($kpi->msa_percen*100,1)." %";
                    })
                    ->editColumn('msa_nilai', function (Kpi $kpi) {
                        return number_format($kpi->msa_nilai*100,2)."%";
                    })
                    ->toJson();
        }

        $data_upload = LastUpload::where('kategori', 'kpi_outlet')->get();
        return view('pages.kpi-msa', [
                'data_upload'         => $data_upload,
            ]);
    }

    public function omb(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = Kpi::select('*');
        }else{
            $data = Kpi::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->editColumn('omb_target', function (Kpi $kpi) {
                        return number_format(round($kpi->omb_target),0,"",".");
                    })
                    ->editColumn('omb_ach', function (Kpi $kpi) {
                        return number_format(round($kpi->omb_ach),0,"",".");
                    })
                    ->editColumn('omb_gap', function (Kpi $kpi) {
                        return number_format(round($kpi->omb_gap),0,"",".");
                    })
                    ->editColumn('omb_percen', function (Kpi $kpi) {
                        return number_format($kpi->omb_percen*100,1)." %";
                    })
                    ->editColumn('omb_nilai', function (Kpi $kpi) {
                        return number_format($kpi->omb_nilai*100,2)."%";
                    })
                    ->toJson();
        }

        $data_upload = LastUpload::where('kategori', 'kpi_outlet')->get();
        return view('pages.kpi-omb', [
                'data_upload'         => $data_upload,
            ]);
    }

    public function qsso(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = Kpi::select('*');
        }else{
            $data = Kpi::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->editColumn('qsso_target', function (Kpi $kpi) {
                        return number_format(round($kpi->qsso_target),0,"",".");
                    })
                    ->editColumn('qsso_ach', function (Kpi $kpi) {
                        return number_format(round($kpi->qsso_ach),0,"",".");
                    })
                    ->editColumn('qsso_gap', function (Kpi $kpi) {
                        return number_format(round($kpi->qsso_gap),0,"",".");
                    })
                    ->editColumn('qsso_percen', function (Kpi $kpi) {
                        return number_format($kpi->qsso_percen*100,1)." %";
                    })
                    ->editColumn('qsso_nilai', function (Kpi $kpi) {
                        return number_format($kpi->qsso_nilai*100,2)."%";
                    })
                    ->toJson();
        }

        $data_upload = LastUpload::where('kategori', 'kpi_outlet')->get();
        return view('pages.kpi-qsso', [
                'data_upload'         => $data_upload,
            ]);
    }

    public function quro(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = Kpi::select('*');
        }else{
            $data = Kpi::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->editColumn('quro_target', function (Kpi $kpi) {
                        return number_format(round($kpi->quro_target),0,"",".");
                    })
                    ->editColumn('quro_ach', function (Kpi $kpi) {
                        return number_format(round($kpi->quro_ach),0,"",".");
                    })
                    ->editColumn('quro_gap', function (Kpi $kpi) {
                        return number_format(round($kpi->quro_gap),0,"",".");
                    })
                    ->editColumn('quro_percen', function (Kpi $kpi) {
                        return number_format($kpi->quro_percen*100,1)." %";
                    })
                    ->editColumn('quro_nilai', function (Kpi $kpi) {
                        return number_format($kpi->quro_nilai*100,2)."%";
                    })
                    ->toJson();
        }

        $data_upload = LastUpload::where('kategori', 'kpi_outlet')->get();
        return view('pages.kpi-quro', [
                'data_upload'         => $data_upload,
            ]);
    }

    public function sc(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = Kpi::select('*');
        }else{
            $data = Kpi::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->editColumn('sc_target', function (Kpi $kpi) {
                        return number_format(round($kpi->sc_target),0,"",".");
                    })
                    ->editColumn('sc_ach', function (Kpi $kpi) {
                        return number_format(round($kpi->sc_ach),0,"",".");
                    })
                    ->editColumn('sc_gap', function (Kpi $kpi) {
                        return number_format(round($kpi->sc_gap),0,"",".");
                    })
                    ->editColumn('sc_percen', function (Kpi $kpi) {
                        return number_format($kpi->sc_percen*100,1)." %";
                    })
                    ->editColumn('sc_nilai', function (Kpi $kpi) {
                        return number_format($kpi->sc_nilai*100,2)."%";
                    })
                    ->toJson();
        }

        $data_upload = LastUpload::where('kategori', 'kpi_outlet')->get();
        return view('pages.kpi-sc', [
                'data_upload'         => $data_upload,
            ]);
    }

    public function ssohvc(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = Kpi::select('*');
        }else{
            $data = Kpi::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->editColumn('ssohvc_target', function (Kpi $kpi) {
                        return number_format(round($kpi->ssohvc_target),0,"",".");
                    })
                    ->editColumn('ssohvc_ach', function (Kpi $kpi) {
                        return number_format(round($kpi->ssohvc_ach),0,"",".");
                    })
                    ->editColumn('ssohvc_gap', function (Kpi $kpi) {
                        return number_format(round($kpi->ssohvc_gap),0,"",".");
                    })
                    ->editColumn('ssohvc_percen', function (Kpi $kpi) {
                        return number_format($kpi->ssohvc_percen*100,1)." %";
                    })
                    ->editColumn('ssohvc_nilai', function (Kpi $kpi) {
                        return number_format($kpi->ssohvc_nilai*100,2)."%";
                    })
                    ->toJson();
        }

        $data_upload = LastUpload::where('kategori', 'kpi_outlet')->get();
        return view('pages.kpi-ssohvc', [
                'data_upload'         => $data_upload,
            ]);
    }

    public function sqsso(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = Kpi::select('*');
        }else{
            $data = Kpi::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->editColumn('sqsso_target', function (Kpi $kpi) {
                        return number_format(round($kpi->sqsso_target),0,"",".");
                    })
                    ->editColumn('sqsso_ach', function (Kpi $kpi) {
                        return number_format(round($kpi->sqsso_ach),0,"",".");
                    })
                    ->editColumn('sqsso_gap', function (Kpi $kpi) {
                        return number_format(round($kpi->sqsso_gap),0,"",".");
                    })
                    ->editColumn('sqsso_percen', function (Kpi $kpi) {
                        return number_format($kpi->sqsso_percen*100,1)." %";
                    })
                    ->editColumn('sqsso_nilai', function (Kpi $kpi) {
                        return number_format($kpi->sqsso_nilai*100,2)."%";
                    })
                    ->toJson();
        }

        $data_upload = LastUpload::where('kategori', 'kpi_outlet')->get();
        return view('pages.kpi-sqsso', [
                'data_upload'         => $data_upload,
            ]);
    }

    public function ssc(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin'){
            $data = Kpi::select('*');
        }else{
            $data = Kpi::where('micro_cluster', $user->micro_cluster_user)->get();
        }

        if ($request->ajax()) {
            
            return Datatables::of($data)
                    ->editColumn('ssc_target', function (Kpi $kpi) {
                        return number_format(round($kpi->ssc_target),0,"",".");
                    })
                    ->editColumn('ssc_ach', function (Kpi $kpi) {
                        return number_format(round($kpi->ssc_ach),0,"",".");
                    })
                    ->editColumn('ssc_gap', function (Kpi $kpi) {
                        return number_format(round($kpi->ssc_gap),0,"",".");
                    })
                    ->editColumn('ssc_percen', function (Kpi $kpi) {
                        return number_format($kpi->ssc_percen*100,1)." %";
                    })
                    ->editColumn('ssc_nilai', function (Kpi $kpi) {
                        return number_format($kpi->ssc_nilai*100,2)."%";
                    })
                    ->toJson();
        }

        $data_upload = LastUpload::where('kategori', 'kpi_outlet')->get();
        return view('pages.kpi-ssc', [
                'data_upload'         => $data_upload,
            ]);
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
        Kpi::find($id)->delete();
    }
}
