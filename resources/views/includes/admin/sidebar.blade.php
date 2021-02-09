<div class="page-sidebar">
    <div class="logo-box"><a href="#" class="logo-text">monitoring</a><a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
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
                        <a href="/site-data" class="{{ (request()->routeIs('site-data.*')) ? 'active' : '' }}">Data Site</a>
                    </li>
                    <li>
                        <a href="/site-transaction" class="{{ (request()->routeIs('site-transaction.*')) ? 'active' : '' }}">Transaksi Site</a>
                    </li>
                </ul>
            </li>
            <li class="{{ (request()->routeIs('site-data.*')) || (request()->routeIs('site-transaction.*')) ? 'active-page' : '' }}">
                <a><i class="material-icons-outlined">store</i>Outlet<i class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="/outlet-data" class="{{ (request()->routeIs('outlet-data.*')) ? 'active' : '' }}">Data Outlet</a>
                    </li>
                    <li>
                        <a href="/outlet-transaction" class="{{ (request()->routeIs('outlet-transaction.*')) ? 'active' : '' }}">Transaksi Outlet</a>
                    </li>
                </ul>
            </li>
            <li class="{{ (request()->routeIs('site-data.*')) || (request()->routeIs('site-transaction.*')) ? 'active-page' : '' }}">
                <a><i class="material-icons-outlined">show_chart</i>KPI CSO<i class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="/" class="{{ (request()->routeIs('.*')) ? 'active' : '' }}">Score</a>
                    </li>
                    <li>
                        <a href="/" class="{{ (request()->routeIs('.*')) ? 'active' : '' }}">Not Order</a>
                    </li>
                    <li>
                        <a href="/" class="{{ (request()->routeIs('.*')) ? 'active' : '' }}">MSA</a>
                    </li>
                    <li>
                        <a href="/" class="{{ (request()->routeIs('.*')) ? 'active' : '' }}">OMB</a>
                    </li>
                    <li>
                        <a href="/" class="{{ (request()->routeIs('.*')) ? 'active' : '' }}">QSSO</a>
                    </li>
                    <li>
                        <a href="/" class="{{ (request()->routeIs('.*')) ? 'active' : '' }}">QURO</a>
                    </li>
                    <li>
                        <a href="/" class="{{ (request()->routeIs('.*')) ? 'active' : '' }}">RGUGA</a>
                    </li>
                    <li>
                        <a href="/" class="{{ (request()->routeIs('.*')) ? 'active' : '' }}">SSO HVC</a>
                    </li>
                    <li>
                        <a href="/" class="{{ (request()->routeIs('.*')) ? 'active' : '' }}">NOM</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="mailbox.html"><i class="material-icons-outlined">book</i>Kamus</a>
            </li>
            <li>
                <a href="mailbox.html"><i class="material-icons-outlined">cloud_upload</i>Import Data</a>
            </li>
            <li>
                <a href="profile.html"><i class="material-icons-outlined">account_circle</i>User</a>
            </li>
        </ul>
    </div>
</div>