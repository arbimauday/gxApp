@extends('layouts.master_admin')

@section('title','Master Web - QR Barcode')

@push('vueApp')
<script src="{{ asset('js/clientMain/masterWebcam/barcode.js') }}"></script>
@endpush

@section('content')
    <div class="content sm-gutter" id="dataBarcode">
        <div class="container-fluid">
            <ul class="breadcrumb p-l-0">
                <li class="breadcrumb-item"><a href="#">Master Web Cam</a></li>
                <li class="breadcrumb-item active">Barcode</li>
            </ul>
        </div>
        <transition>
            <keep-alive>
                <router-view></router-view>
            </keep-alive>
        </transition>
    </div>
@endsection