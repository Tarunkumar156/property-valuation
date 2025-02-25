<aside class="text-white shadow-lg rounded" id="sidebar-wrapper">
    <div class="sidebar-brand">
        <div class="d-flex mt-3 mt-md-0" style="height: 48px;">
            <span class="fs-5 ms-2 fw-bold fst-italic text-white">
                <i class="bi bi-building" style="font-size: 2rem; color: white;"></i>

            </span>
            <span class="fs-4 mt-2 ms-3 fw-bold text-white">
                Valuation
            </span>
        </div>
    </div>
    <ul class="sidebar-nav">

        <li class="">
            <a href="{{ route('admindashboard') }}" id="dashboard_sidenav" class="nav-link text-white border-0 fw-bold">
                <i class="bi bi-speedometer me-4 fs-5"></i>Dashboard
            </a>
        </li>


        <li class="">
            <a href="{{ route('customer') }}" id="customer_sidenav" class="nav-link text-white border-0 fw-bold">
                <i class="bi bi-people me-4 fs-5"></i>Customer
            </a>
        </li>
        <li class="">
            <a href="{{ route('valuation') }}" id="property_sidenav" class="nav-link text-white border-0 fw-bold">
                <i class="bi bi-images me-4 fs-5"></i>Valuation
            </a>
        </li>

        {{-- <li class="">
            <a href="{{ route('admindashboard') }}" id="dashboard_sidenav" class="nav-link text-white border-0 fw-bold">
                <i class="bi bi-person-bounding-box me-4 fs-5"></i>Professional
            </a>
        </li> --}}
        <li>
            <a id="report_sidenav" class="nav-link text-white border-0 fw-bold btn-toggle align-items-center collapsed"
                data-bs-toggle="collapse" data-bs-target="#report-collapse" aria-expanded="false">
                <i class="bi bi-clipboard2-data me-4 fs-5"></i>Reports
            </a>
            <div class="collapse" id="report-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-bold pb-1 small sidebar-drp">
                    <li>
                        <a href="{{ route('customerreport') }}" id="customerreport_sidenav" class="text-white rounded">
                            <i class="bi bi-person-lines-fill me-4 fs-6"></i><small>Customer Report</small>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('valuationreport') }}" id="valuationreport_sidenav"
                            class="text-white rounded">
                            <i class="bi-person-rolodex me-4 fs-6"></i><small>Valuation Report</small></a>
                    </li>
                </ul>
            </div>
        </li>


        <li>
            <a href="{{ route('settings') }}" id="setting_sidenav" class="nav-link text-white border-0 fw-bold">
                <i class="bi bi-sliders me-4 fs-5"></i>Settings
            </a>
        </li>


        <li>
            <a href="{{ route('adminlogout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" id="logout"
                class="nav-link text-white border-0 text-danger fw-bold">
                <i class="bi bi-power me-4 fs-5"></i>Logout
            </a>
        </li>
        <form id="logout-form" action="{{ route('adminlogout') }}" method="GET" style="display: none;">
            @csrf
        </form>
    </ul>
</aside>
