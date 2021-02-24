@extends('layouts.master-admin')
@section('content')
<?php
$score      = '';
$not_order  = '';
$msa_target = '';
$msa_ach    = '';
$msa_gap = '';
$msa_nilai  = '';
$omb_target = '';
$omb_ach    = '';
$omb_nilai = '';
$omb_gap    = '';
$qsso_target = '';
$qsso_ach    = '';
$qsso_nilai = '';
$qsso_gap    = '';
$quro_target = '';
$quro_ach    = '';
$quro_nilai = '';
$quro_gap    = '';
$sc_target = '';
$sc_ach    = '';
$sc_nilai = '';
$sc_gap    = '';
$ssohvc_target = '';
$ssohvc_ach    = '';
$ssohvc_nilai = '';
$ssohvc_gap    = '';
$sqsso_target = '';
$sqsso_ach    = '';
$sqsso_nilai = '';
$sqsso_gap    = '';
$ssc_target = '';
$ssc_ach    = '';
$ssc_nilai = '';
$ssc_gap    = '';
?>
@foreach($data_dashboard as $data)
<?php 
$score      = $data->score;
$not_order  = $data->not_order;
$msa_target = $data->msa_target;
$msa_ach    = $data->msa_ach;
$msa_gap = $data->msa_gap;
$msa_nilai  = $data->msa_nilai;
$omb_target = $data->omb_target;
$omb_ach    = $data->omb_ach;
$omb_nilai = $data->omb_nilai;
$omb_gap    = $data->omb_gap;
$qsso_target = $data->qsso_target;
$qsso_ach    = $data->qsso_ach;
$qsso_nilai = $data->qsso_nilai;
$qsso_gap    = $data->qsso_gap;
$quro_target = $data->quro_target;
$quro_ach    = $data->quro_ach;
$quro_nilai = $data->quro_nilai;
$quro_gap    = $data->quro_gap;
$sc_target = $data->sc_target;
$sc_ach    = $data->sc_ach;
$sc_nilai = $data->sc_nilai;
$sc_gap    = $data->sc_gap;
$ssohvc_target = $data->ssohvc_target;
$ssohvc_ach    = $data->ssohvc_ach;
$ssohvc_nilai = $data->ssohvc_nilai;
$ssohvc_gap    = $data->ssohvc_gap;
$sqsso_target = $data->sqsso_target;
$sqsso_ach    = $data->sqsso_ach;
$sqsso_nilai = $data->sqsso_nilai;
$sqsso_gap    = $data->sqsso_gap;
$ssc_target = $data->ssc_target;
$ssc_ach    = $data->ssc_ach;
$ssc_nilai = $data->ssc_nilai;
$ssc_gap    = $data->ssc_gap;
?>
@endforeach
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Indosat</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-header text-center">
                        Plan Hari Ini
                    </div>
                    <div class="card-body">
                        @if($data_rencana == null)
                        <h5 class="card-title">Tidak Ada Data</h5>
                        <p class="card-text">Tidak Ada Data</p>
                        @else
                        <h5 class="card-title">{{$data_rencana->judul}}</h5>
                        <p class="card-text">{{$data_rencana->isi}}</p>
                        @endif
                        <a href="{{ route('rencana.index') }}" class="btn btn-primary">Lebih Detail</a>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">
                        KPI Score Total
                    </div>
                    <div class="card-body">
                        <div class="dashboard-stat">
                            <p>{{number_format($score*100,2)."%"}}</p>
                            <span>score</span>
                        </div>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">
                        Outlet Not Order
                    </div>
                    <div class="card-body">
                        <div class="dashboard-stat">
                            <p>{{$not_order}}</p>
                            <span>outlet</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="card text-center">
                    <div class="card-header">
                        MSA
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($msa_target),0,"",".")}}</p>
                                    <span>Target</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($msa_ach),0,"",".")}}</p>
                                    <span>Achievement</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($msa_gap),0,"",".")}}</p>
                                    <span>GAP</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat score">
                                    <p>{{number_format($msa_nilai*100,2)."%"}}</p>
                                    <span>Score</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">
                        OMB
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($omb_target),0,"",".")}}</p>
                                    <span>Target</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($omb_ach),0,"",".")}}</p>
                                    <span>Achievement</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($omb_gap),0,"",".")}}</p>
                                    <span>GAP</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat score">
                                    <p>{{number_format($omb_nilai*100,2)."%"}}</p>
                                    <span>Score</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">
                        QSSO
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($qsso_target),0,"",".")}}</p>
                                    <span>Target</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($qsso_ach),0,"",".")}}</p>
                                    <span>Achievement</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($qsso_gap),0,"",".")}}</p>
                                    <span>GAP</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat score">
                                    <p>{{number_format($qsso_nilai*100,2)."%"}}</p>
                                    <span>Score</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">
                        QURO
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($quro_target),0,"",".")}}</p>
                                    <span>Target</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($quro_ach),0,"",".")}}</p>
                                    <span>Achievement</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($quro_gap),0,"",".")}}</p>
                                    <span>GAP</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat score">
                                    <p>{{number_format($quro_nilai*100,2)."%"}}</p>
                                    <span>Score</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl">
            <div class="card text-center">
                    <div class="card-header">
                        Serious Customer
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($sc_target),0,"",".")}}</p>
                                    <span>Target</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($sc_ach),0,"",".")}}</p>
                                    <span>Achievement</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($sc_gap),0,"",".")}}</p>
                                    <span>GAP</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat score">
                                    <p>{{number_format($sc_nilai*100,2)."%"}}</p>
                                    <span>Score</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">
                        SSO HVC
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($ssohvc_target),0,"",".")}}</p>
                                    <span>Target</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($ssohvc_ach),0,"",".")}}</p>
                                    <span>Achievement</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($ssohvc_gap),0,"",".")}}</p>
                                    <span>GAP</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat score">
                                    <p>{{number_format($ssohvc_nilai*100,2)."%"}}</p>
                                    <span>Score</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">
                        Serious QSSO
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($sqsso_target),0,"",".")}}</p>
                                    <span>Target</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($sqsso_ach),0,"",".")}}</p>
                                    <span>Achievement</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($sqsso_gap),0,"",".")}}</p>
                                    <span>GAP</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat score">
                                    <p>{{number_format($sqsso_nilai*100,2)."%"}}</p>
                                    <span>Score</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">
                        Site Serious Customer
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($ssc_target),0,"",".")}}</p>
                                    <span>Target</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($ssc_ach),0,"",".")}}</p>
                                    <span>Achievement</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat">
                                    <p>{{number_format(round($ssc_gap),0,"",".")}}</p>
                                    <span>GAP</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-stat score">
                                    <p>{{number_format($ssc_nilai*100,2)."%"}}</p>
                                    <span>Score</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection