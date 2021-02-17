<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.kpi-score');
    }

    public function msa()
    {
        return view('pages.kpi-msa');
    }

    public function omb()
    {
        return view('pages.kpi-omb');
    }

    public function qsso()
    {
        return view('pages.kpi-qsso');
    }

    public function quro()
    {
        return view('pages.kpi-quro');
    }

    public function sc()
    {
        return view('pages.kpi-sc');
    }

    public function ssohvc()
    {
        return view('pages.kpi-ssohvc');
    }

    public function sqsso()
    {
        return view('pages.kpi-sqsso');
    }

    public function ssc()
    {
        return view('pages.kpi-ssc');
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
