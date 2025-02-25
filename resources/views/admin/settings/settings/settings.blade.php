@extends('components.admin.layouts.adminapp')
@section('headSection')
@endsection

@section('adminnavbar')
    <x-admin.layouts.adminnavbar modulename="SETTINGS" />
@endsection

@section('main-content')
    <x-admin.layouts.adminbreadcrumb>
        <li class="breadcrumb-item active" aria-current="page">
            Settings
        </li>
    </x-admin.layouts.adminbreadcrumb>

    <div class="p-2">
        @include('admin.settings.settings.mastersettings')
        @include('admin.settings.settings.usersettings')
        @include('admin.settings.settings.generalsettings')
        {{-- @include('admin.settings.settings.otphistory')
        @include('admin.settings.settings.termsandsupport') --}}
        @include('admin.settings.settings.trackingsettings')
    </div>
@endsection
@section('footerSection')
    @include('helper.sidenavhelper.sidenavactive', [
        'type' => 1,
        'nameone' => '#setting_sidenav',
    ])
@endsection
