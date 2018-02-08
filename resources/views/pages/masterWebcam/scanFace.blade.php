@extends('layouts.master_admin')

@section('title','Master Web - Scan Face')

@push('vueApp')
<script src="{{ asset('js/clientMain/masterWebcam/barcode.js') }}"></script>
@endpush

@section('content')
    <div class="content sm-gutter" id="scanFace">
        <div class="container-fluid">
            <ul class="breadcrumb p-l-0">
                <li class="breadcrumb-item"><a href="#">Master Web Cam</a></li>
                <li class="breadcrumb-item active">Scan Face</li>
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
    <script src="{{ asset('js/faceApi/makeblob.js') }}"></script>
    <script src="{{ asset('js/faceApi/creat_group.js') }}"></script>
    <script src="{{ asset('js/faceApi/person.js') }}"></script>
    <script src="{{ asset('js/faceApi/training.js') }}"></script>
    <script src="{{ asset('js/faceApi/face_identify.js') }}"></script>
@endsection