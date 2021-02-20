<div class="page-sidebar">
    <div class="logo-box"><a href="#" class="logo-text">monitoring</a><a href="" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Menu
            </li>
            <li class="{{ (request()->routeIs('/.*')) ? 'active-page' : '' }}">
                <a href="/"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
            </li>
            <li class="{{ (request()->routeIs('site-data.*')) || (request()->routeIs('site-transaction.*')) ? 'active-page' : '' }}">
                <a><i class="material-icons-outlined">settings_input_antenna</i>Site<i class="material-icons has-sub-menu">add</i></a>
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
                <a><i class="material-icons-outlined">store</i>Outlet<i class="material-icons has-sub-menu">add</i></a>
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
                <a><i class="material-icons-outlined">show_chart</i>KPI CSO<i class="material-icons has-sub-menu">add</i></a>
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
            <li class="{{ (request()->routeIs('/.*')) ? 'active-page' : '' }}">
                <a href="mailbox.html"><i class="material-icons-outlined">book</i>Kamus</a>
            </li>
            <li class="{{ (request()->routeIs('')) || (request()->routeIs('')) ? 'active-page' : '' }}">
                <a><i class="material-icons-outlined">assignment</i>Rencana<i class="material-icons has-sub-menu">add</i></a>
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
            <li class="{{ (request()->routeIs('import.*')) ? 'active-page' : '' }}">
                <a href="{{ route('import.index') }}"><i class="material-icons-outlined">cloud_upload</i>Import Data</a>
            </li>
            <li class="{{ (request()->routeIs('/.*')) ? 'active-page' : '' }}">
                <a href="profile.html"><i class="material-icons-outlined">account_circle</i>User</a>
            </li>
        </ul>
    </div>
</div>