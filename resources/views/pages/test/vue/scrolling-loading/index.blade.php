@extends('layouts.master_admin')

@section('title','Test - Vue Scrolling')

@push('vueApp')
<script src="{{ asset('js/test/vue/scrolling-loading.js' ) }}"></script>
@endpush

@section('content')
    <div class="content sm-gutter" id="appVueScrolling">
        <div class="container-fluid">
            <ul class="breadcrumb p-l-0">
                <li class="breadcrumb-item"><a href="#">Test</a></li>
                <li class="breadcrumb-item active">Scrolling Vue</li>
            </ul>
        </div>
        <index></index>
    </div>
@endsection