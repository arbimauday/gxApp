@extends('layouts.master_admin')

@section('title','Master Vehicle - Car')

@push('vueApp')
    <script src="{{ asset('js/masterVehicle/vehicle.js') }}"></script>
@endpush

@section('content')
    <div class="content sm-gutter" id="mainCar">
        <div class="container-fluid">
            <ul class="breadcrumb p-l-0">
                <li class="breadcrumb-item"><a href="#">Master Vehicle</a></li>
                <li class="breadcrumb-item active">Car</li>
            </ul>
        </div>
        <transition>
            <keep-alive>
                <router-view></router-view>
            </keep-alive>
        </transition>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){

        });
    </script>
    {{--<script src="{{ asset('temp/assets/js/card.js') }}"></script>--}}
@endsection