@extends('components.admin.layouts.adminapp')
@section('headSection')
@endsection

@section('adminnavbar')
    <x-admin.layouts.adminnavbar modulename="Property Valuation" />
@endsection

@section('main-content')
    <x-admin.layouts.adminbreadcrumb>
        <li class="breadcrumb-item active" aria-current="page">Property Valuation</li>
    </x-admin.layouts.adminbreadcrumb>


    @livewire('admin.valuation.valuationprocess.valuationprocesslivewire', ['valuation_id' => $id])
@endsection
@section('footerSection')
    @include('helper.sidenavhelper.sidenavactive', [
        'type' => 1,
        'nameone' => '#property_sidenav',
    ])
    @include('helper.modalhelper.livewiremodal')
@endsection
