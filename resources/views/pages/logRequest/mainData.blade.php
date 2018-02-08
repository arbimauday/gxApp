@extends('layouts.master_admin')

@section('title','Log Request')

@push('vueApp')
    <script src="{{ asset('js/app.js' ) }}"></script>
@endpush

@section('content')
    <div class="content sm-gutter">
        <div class="container-fluid">
            <ul class="breadcrumb p-l-0">
                <li class="breadcrumb-item"><a href="#">Master Vehicle</a></li>
                <li class="breadcrumb-item active">Motorcycle</li>
            </ul>
        </div>

        <!-- View Contents -->
        <div class="container full-width container-fluid container-fixed-lg">
            <div class="row">
                <div class="col-lg-4 col-xs-8 col-sm-8 m-b-10">
                    <div class="input-group date col-md-8 col-xs-12 col-sm-8 p-l-0 datepickerSearch">
                        <input type="text" name="searchDate" readonly value="{{ date('d-m-Y') }}" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>

                <div class="col-md-12 m-b-20 bg-white">
                    <div class="card card-transparent">
                        <div class="card-header ">
                            <div class="card-title">Table List Job Request</div>
                            <div class="pull-right">
                                <div class="col-xs-12">
                                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-block">
                            <table class="table table-hover demo-table-search table-responsive-block table-list">
                                <thead>
                                <tr>
                                    <th style="width:10px;">No</th>
                                    <th style="width:30px;">Couser</th>
                                    <th style="width:15px;">Via</th>
                                    <th style="width:15px;">Causer IP Adress</th>
                                    <th style="width:25px;">Subject</th>
                                    <th style="width:15px;">Action</th>
                                    <th style="width:10px;">Level</th>
                                    <th style="width:50px">Description</th>
                                    <th style="width:50px;">Created At</th>
                                </tr>
                                </thead>
                                <tbody class="listDataLogReques">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>


        $(document).ready(function() {
            $('.datepickerSearch').datepicker({ // datepicker
                format: 'dd-mm-yyyy',
                autoclose: true
            });

            $('[name="searchDate"]').change(function () { // event chenges search
                getData();
            });
            function getData() { // get data with ajax
                var dateSearch = $('[name="searchDate"]').val();
                $.ajax({
                   url : "api/logRequest/viewdata?whereDate="+dateSearch,
                   type: 'get',
                   dataType : 'JSON',
                   success : function (data) {
                       $('.listDataLogReques').html('');
                       $('.listDataLogReques').append(data);
                   }
                });
            }
            getData();
        });


    </script>
@endsection