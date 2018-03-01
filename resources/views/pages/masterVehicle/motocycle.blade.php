@extends('layouts.master_admin')

@section('title','Master Vehicle - Motocycle')

@push('vueApp')
    <script src="{{ asset('js/clientMain//masterVehicle/vehicle.js') }}"></script>
@endpush

@section('content')
    <div class="content sm-gutter" id="mainMotorcycle">
        <div class="container-fluid">
            <ul class="breadcrumb p-l-0">
                <li class="breadcrumb-item"><a href="#">Master Vehicle</a></li>
                <li class="breadcrumb-item active">Motorcycle</li>
            </ul>
        </div>
        <transition>
            <keep-alive>
                <router-view></router-view>
            </keep-alive>
        </transition>
    </div>
@endsection