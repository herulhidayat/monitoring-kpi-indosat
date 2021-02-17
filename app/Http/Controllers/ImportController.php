<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kpi;
use App\Models\Outlet;
use App\Models\Site;
use App\Models\LastUpload;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Imports\KpiOutletImport;
use App\Imports\SiteImport;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.import');
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

    public function importKpiOutlet(Request $request)
    {
        if($request->file == ''){
            return back();
        }else{
            
            Excel::import(new KpiOutletImport,request()->file('file'));

            $upload = LastUpload::where('kategori', 'kpi_outlet');
            $mytime = carbon::now();
            $upload->update([
                    'waktu_upload'  => $mytime->toDateTimeString(),
            ]);
            return back();
        }
        
    }

    public function importSite(Request $request)
    {
        if($request->file == ''){
            return back();
        }else{
            Excel::import(new SiteImport,request()->file('file'));

            $upload = LastUpload::where('kategori', 'site');
            $mytime = carbon::now();
            $upload->update([
                'waktu_upload'  => $mytime->toDateTimeString(),
            ]);  
        return back();
        }
        
    }
}
