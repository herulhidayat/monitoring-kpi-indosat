<?php 
    $user = $user = Auth::user();
?>
<div class="horizontal-bar">
    <div class="logo-box"><a href="#" class="logo-text">monitoring</a></div>
    <a href="#" class="hide-horizontal-bar"><i class="material-icons">close</i></a>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="horizontal-bar-menu">
                    <ul>
                        @if($user->role !== 'Admin' && $user->role !== 'SPV')
                        <li class="{{ (request()->routeIs('dashboard.*')) ? 'active-page' : '' }}">
                            <a href="{{ route('dashboard.index') }}"><i class="material-icons-outlined">dashboard</i> Dashboard</a>
                        </li>
                        @endif
                        <li class="{{ (request()->routeIs('')) || (request()->routeIs('')) ? 'active-page' : '' }}">
                            <a href=""><i class="material-icons-outlined">assignment</i> Rencana<i class="material-icons">keyboard_arrow_down</i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="" class="{{ (request()->routeIs('')) ? 'active' : '' }}">Buat Rencana</a>
                                </li>
                                <li>
                                    <a href="" class="{{ (request()->routeIs('')) ? 'active' : '' }}">Rencana Aktif</a>
                                </li>
                                <li>
                                    <a href="" class="{{ (request()->routeIs('')) ? 'active' : '' }}">Rencana Selesai</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ (request()->routeIs('site-data.*')) || (request()->routeIs('site-transaction.*')) ? 'active-page' : '' }}">
                            <a href=""><i class="material-icons-outlined">settings_input_antenna</i> Site<i class="material-icons">keyboard_arrow_down</i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('site-data.index') }}" class="{{ (request()->routeIs('site-data.index')) ? 'active' : '' }}">Data Site</a>
                                </li>
                                <li>
                                    <a href="/site-transaction" class="{{ (request()->routeIs('site-data.siteTransaction')) ? 'active' : '' }}">Transaksi Site</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ (request()->routeIs('outlet-data.*')) ? 'active-page' : '' }}">
                            <a href=""><i class="material-icons-outlined">store</i> Outlet<i class="material-icons">keyboard_arrow_down</i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('outlet-data.index') }}" class="{{ (request()->routeIs('outlet-data.index')) ? 'active' : '' }}">Data Outlet</a>
                                </li>
                                <li>
                                    <a href="/outlet-transaction" class="{{ (request()->routeIs('outlet-data.outletTransaction')) ? 'active' : '' }}">Transaksi Outlet</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ (request()->routeIs('kpi-data.*')) ? 'active-page' : '' }}">
                            <a href=""><i class="material-icons-outlined">show_chart</i> KPI CSO<i class="material-icons">keyboard_arrow_down</i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('kpi-data.index') }}" class="{{ (request()->routeIs('kpi-data.index')) ? 'active' : '' }}">Score</a>
                                </li>
                                <li>
                                    <a href="/kpi-msa" class="{{ (request()->routeIs('kpi-data.msa')) ? 'active' : '' }}">MSA</a>
                                </li>
                                <li>
                                    <a href="/kpi-omb" class="{{ (request()->routeIs('kpi-data.omb')) ? 'active' : '' }}">OMB</a>
                                </li>
                                <li>
                                    <a href="/kpi-qsso" class="{{ (request()->routeIs('kpi-data.qsso')) ? 'active' : '' }}">QSSO</a>
                                </li>
                                <li>
                                    <a href="/kpi-quro" class="{{ (request()->routeIs('kpi-data.quro')) ? 'active' : '' }}">QURO</a>
                                </li>
                                <li>
                                    <a href="/kpi-sc" class="{{ (request()->routeIs('kpi-data.sc')) ? 'active' : '' }}">Serious Customer</a>
                                </li>
                                <li>
                                    <a href="/kpi-ssohvc" class="{{ (request()->routeIs('kpi-data.ssohvc')) ? 'active' : '' }}">SSO HVC</a>
                                </li>
                                <li>
                                    <a href="/kpi-sqsso" class="{{ (request()->routeIs('kpi-data.sqsso')) ? 'active' : '' }}">Serious QSSO</a>
                                </li>
                                <li>
                                    <a href="/kpi-ssc" class="{{ (request()->routeIs('kpi-data.ssc')) ? 'active' : '' }}">Site Serious Customer</a>
                                </li>
                            </ul>
                        </li>
                        @if($user->role == 'Admin' || $user->role == 'SPV')
                        <li class="{{ (request()->routeIs('import.*')) ? 'active-page' : '' }}">
                            <a href="{{ route('import.index') }}"><i class="material-icons-outlined">cloud_upload</i> Import Data</a>
                        </li>
                        @endif
                        @if($user->role == 'Admin')
                        <li class="{{ (request()->routeIs('user.*')) ? 'active-page' : '' }}">
                            <a href="{{ route('user.index') }}"><i class="material-icons-outlined">account_circle</i> User</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>