@extends('components.admin.layouts.adminapp')
@section('headSection')
@endsection

@section('adminnavbar')
    <x-admin.layouts.adminnavbar modulename="SETTINGS" />
@endsection

@section('main-content')
    <x-admin.layouts.adminbreadcrumb>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('settings') }}">Settings</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tracking</li>
    </x-admin.layouts.adminbreadcrumb>

    @livewire('admin.settings.tracking.trackinglivewire')
@endsection
@section('footerSection')
    @include('helper.sidenavhelper.sidenavactive', [
        'type' => 1,
        'nameone' => '#setting_sidenav',
    ])
@endsection
