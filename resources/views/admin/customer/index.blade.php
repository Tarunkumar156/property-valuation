@extends('components.admin.layouts.adminapp')
@section('headSection')
@endsection

@section('adminnavbar')
    <x-admin.layouts.adminnavbar modulename="CUSTOMER" />
@endsection

@section('main-content')
    <x-admin.layouts.adminbreadcrumb>
        <li class="breadcrumb-item active" aria-current="page">Customer</li>
    </x-admin.layouts.adminbreadcrumb>


    @livewire('admin.customer.customerlivewire')
@endsection
@section('footerSection')
    @include('helper.sidenavhelper.sidenavactive', [
        'type' => 1,
        'nameone' => '#customer_sidenav',
    ])
    @include('helper.modalhelper.livewiremodal')
@endsection
