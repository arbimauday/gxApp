@extends('layouts.master_admin')
@section('title','Report Error')

@push('vueApp')
    <script src="{{ asset('js/clientMain/reportData.js') }}"></script>
@endpush

@section('content')
    <div class="content full-height" id="reportAdmin">
        <router-view></router-view>
        {{--<MainDataview></MainDataview>--}}
    </div>
@endsection