@extends('components.admin.layouts.adminapp')
@section('headSection')
@endsection

@section('adminnavbar')
    <x-admin.layouts.adminnavbar modulename="CUSTOMER REPORT" />
@endsection
@section('main-content')
    <x-admin.layouts.adminbreadcrumb>
        <li class="breadcrumb-item active" aria-current="page">Customer Report</li>
    </x-admin.layouts.adminbreadcrumb>
    @livewire('admin.reports.customerreport.customerreportlivewire')
@endsection
@section('footerSection')
    @include('helper.sidenavhelper.sidenavactive', [
        'type' => 2,
        'collapsename' => '#report-collapse',
        'nameone' => '#report_sidenav',
        'nametwo' => '#customerreport_sidenav',
    ])
@endsection
