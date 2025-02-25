@extends('components.admin.layouts.adminapp')
@section('headSection')
    <style>
        .zoom {
        transition: transform .2s;
        margin: 0 auto;
        }
        
        .zoom:hover {
        transform: scale(1.1);
        background-color:#3666A6 ;
        color: white;
        }
    </style>
@endsection

@section('adminnavbar')
    <x-admin.layouts.adminnavbar modulename="DASHBOARD" />
@endsection

@section('main-content')
    <div class="card mx-auto border-0 bg-light">
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <a href="{{ route('customer') }}" class="text-decoration-none text-dark text-center" >
                        <div class="card shadow-sm zoom">
                            <div class="card-body">
                                <h5 class="card-title">Total Customer</h5>
                                <hr>
                                <h2 class="card-text">{{ $customer }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('valuation') }}" class="text-decoration-none text-dark text-center">
                        <div class="card shadow-sm zoom">
                            <div class="card-body">
                                <h5 class="card-title">Total Valuation</h5>
                                <hr>
                                <h2 class="card-text">{{ $valuation }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- <div class="col">
                    <a href="{{ route('admindashboard') }}" class="text-decoration-none text-dark text-center">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Total Professional</h5>
                                <hr>
                                <h2 class="card-text">87</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('admindashboard') }}" class="text-decoration-none text-dark text-center">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Total Transaction</h5>
                                <hr>
                                <h2 class="card-text">87</h2>
                            </div>
                        </div>
                    </a>
                </div> --}}
                <div class="col">
                    <a href="{{ route('valuation') }}" class="text-decoration-none text-dark text-center">
                        <div class="card shadow-sm zoom">
                            <div class="card-body">
                                <h5 class="card-title">Valuation Inprogress</h5>
                                <hr>
                                <h2 class="card-text">{{ $valuation }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footerSection')
    @include('helper.sidenavhelper.sidenavactive', [
        'type' => 1,
        'nameone' => '#dashboard_sidenav',
    ])
@endsection
