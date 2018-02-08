@extends('layouts.master_admin')
@section('title','Report Error')

@push('vueApp')
<script src="{{ asset('js/clientMain/reportData.js') }}"></script>
@endpush

@section('content')
    <div class="content full-height" id="reportUser">
        {{--<User_report></User_report>--}}
        <router-view></router-view>
    </div>
@endsection