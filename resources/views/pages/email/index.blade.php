@extends('layouts.master_admin')
@section('title','Email')

@push('vueApp')
<script src="{{ asset('js/clientMain/email/email.js') }}"></script>
@endpush

@section('content')
    <div class="content full-height" id="appEmail">
        <router-view></router-view>
    </div>
@endsection