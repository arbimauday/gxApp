@extends('layouts.master_admin')

@section('title','Monitoring - Checking Error')

@push('vueApp')
    <script src="{{ asset('js/clientMain/monitoring/checkingError.js') }}"></script>
@endpush

@section('content')
    <div class="content sm-gutter" id="appData">
        <div class="container-fluid">
            <ul class="breadcrumb p-l-0">
                <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
                <li class="breadcrumb-item active">Checking Jobs</li>
            </ul>
        </div>
        {{--<Maindata></Maindata>--}}
        <transition>
            <keep-alive>
                <router-view></router-view>
            </keep-alive>
        </transition>
    </div>
@endsection

@section('script')
    {{--<script src="{{ asset('temp/assets/js/datatables.js') }}" type="text/javascript"></script>--}}
@endsection