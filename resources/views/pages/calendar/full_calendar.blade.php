@extends('layouts.master_admin')

@section('title','Full Calendar')

@section('css')
    <link rel="stylesheet" href="{{ asset('full_cal/css/fullcalendar.css') }}">
    <style>
        .fc-bg .fc-sun {
            /*background-color: #ffe4e4 !important;*/
            background-color: rgba(255, 155, 179, 0.16) !important;
            border: 1px solid #ddd;
            border-color: #ddd;
        }

        .fc-event{
            border: 0px;
        }
    </style>
@endsection


@section('content')

    <div class="content sm-gutter">
      <div class="container-fluid">
        <ul class="breadcrumb p-l-0">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Plain template</li>
        </ul>
        <!-- END BREADCRUMB -->
        <h3 class="page-title">Calendar</h3>
      </div>

      <div class="container full-width">
        <div class="row">
          <div class="col-md-2">
              {{-- Data Event --}}
             <div class="card m-b-0">
                <div class="card-header">
                   <h3 class="card-title"><i class="fa fa-calendar m-r-5"></i> EVENTS</h3>
                </div>

                <ul class="list-group calendar-list">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fs-14 fa fa-circle p-r-15 text-danger"></i>Admin Calendar
                    </span>
                        <span class="badge-pill">
                        <input type="checkbox" data-init-plugin="switchery" value="1" data-size="small" name="color-box" data-color="danger" onchange="filterdata()">
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fs-14 fa fa-circle p-r-15 text-success"></i>Home Calendar
                    </span>
                        <span class="badge-pill">
                        <input type="checkbox" data-init-plugin="switchery" value="2" data-size="small" name="color-box" data-color="success" onchange="filterdata()">
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fs-14 fa fa-circle p-r-15 text-primary"></i>Work calendar
                    </span>
                        <span class="badge-pill">
                        <input type="checkbox" data-init-plugin="switchery" value="3" data-size="small" name="color-box" data-color="primary" onchange="filterdata()">
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fs-14 fa fa-circle p-r-15 text-warning"></i>Calendar One
                    </span>
                    <span class="badge-pill">
                        <input type="checkbox" data-init-plugin="switchery" value="4" data-size="small" name="color-box" data-color="warning" onchange="filterdata()">
                    </span>
                  </li>
                </ul>
             </div>

             {{-- List Employee --}}
             <div class="card m-t-5">
               <div class="card-header">
                  <h3 class="card-title"><i class="fa fa-user m-r-5"></i> Employee</h3>
               </div>

               <div class="list-group p-r-10 p-l-10">
                   <div class="form-group">
                       <select class="full-width" data-init-plugin="select2" onchange="filterdata()" name="employee_search">
                           <option value="">All Employee</option>
                           @foreach($user as $e)
                           <option value="{{ $e->id }}">{{ $e->full_name }}</option>
                           @endforeach
                       </select>
                   </div>
               </div>

               <div class="list-group">
                   <div class="list-group-item p-b-0">
                       <label for="title" class="col-sm-12 no-padding m-b-0 m-t-0 text-green">Divisi</label>
                       <div class="col-sm-12 no-padding">
                           <div class="card-title p-l-10 gray-dark m-b-1">CSO</div>
                       </div>
                   </div>
               </div>
             </div>

          </div>

          <div class="col-md-10 bg-white padding-10">
            <div class="col-md-12"> {{-- list yearrt --}}

            </div>

            <div class="col-md-12 m-b-20 p-l-50"> {{-- list month --}}
                <ul class="list-unstyled" id="navMonth">
                    <li class="hint-text">
                        <div class="thumbnail-wrapper text-black bold" data-month="0">Jan</div>
                        <div class="thumbnail-wrapper m-l-15" data-month="1">Feb</div>
                        <div class="thumbnail-wrapper m-l-15" data-month="2">Mar</div>
                        <div class="thumbnail-wrapper m-l-15" data-month="3">Apr</div>
                        <div class="thumbnail-wrapper m-l-15" data-month="4">May</div>
                        <div class="thumbnail-wrapper m-l-15" data-month="5">Jun</div>
                        <div class="thumbnail-wrapper m-l-15" data-month="6">Jul</div>
                        <div class="thumbnail-wrapper m-l-15" data-month="7">Aug</div>
                        <div class="thumbnail-wrapper m-l-15" data-month="8">Sep</div>
                        <div class="thumbnail-wrapper m-l-15" data-month="9">Oct</div>
                        <div class="thumbnail-wrapper m-l-15" data-month="10">Nov</div>
                        <div class="thumbnail-wrapper m-l-15" data-month="11">Dec</div>
                    </li>
                </ul>
            </div><br>

            <div id="calendar" class="col-centered col-md-12 no-padding"></div>
          </div>
        </div>
      </div>
        <!-- /.row -->

        <!-- Modal -->
        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" id="form_addHoliday">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-12 control-label">Title</label>
                                <div class="col-sm-12">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="color" class="col-sm-12 control-label">Color</label>
                                <div class="col-sm-12">
                                    <select name="classname" class="form-control" id="color">
                                        <option value="">Choose</option>
                                        @foreach($color as $c)
                                            <option value="{{ $c->id_color }}">{{ $c->clr_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="start" class="col-sm-12 control-label">Start date</label>
                                <div class="col-sm-12">
                                    <input type="text" name="start" class="form-control" id="start" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end" class="col-sm-12 control-label">End date</label>
                                <div class="col-sm-12">
                                    <input type="text" name="end"  class="form-control datepicker-component" id="end" data-date-format="yyyy-mm-dd" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_user" class="col-sm-12 control-label">User</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="id_user" id="id_user" required>
                                        <option value="">-- User --</option>
                                        @foreach($user as $u)
                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="add_holiday()">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" id="form_update">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group no-padding">
                                <label for="title" class="col-sm-12 control-label">Name Employee</label>
                                <div class="col-sm-12">
                                    <div class="card-title p-l-10" id="username"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-sm-12 control-label">Title</label>
                                <div class="col-sm-12">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="color" class="col-sm-12 control-label">Color</label>
                                <div class="col-sm-12">
                                    <select name="classname" class="form-control" id="colors">
                                        @foreach($color as $c)
                                            <option value="{{ $c->id_color }}">{{ $c->clr_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-12">
                                    <div class="checkbox check-danger">
                                        {{--<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>--}}
                                        <input type="checkbox" name="delete" id="checkbox6">
                                        <label for="checkbox6">Delete event</label>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id" class="form-control" id="id">
                            <input type="hidden" name="id_user" class="form-control" id="id_user">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="update_data()">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
@endsection



@section('script')
    <!-- FullCalendar -->
    <script src="{{ asset('full_cal/js/moment.min.js') }}"></script>
    <script src="{{ asset('full_cal/js/fullcalendar.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            filterdata(); // running full calendar

            var getColordata = [];
            $('input[name="color-box"]:checked').each(function(){
                getColordata.push([this.value]);
            });

            /*---------------- naviagation fullcalendar -------------*/
            var getmonth = '{{ date('m') - 1 }}';
            $('#navMonth div[data-month="'+ getmonth +'"]').addClass('text-black bold').siblings().removeClass('text-black bold');
            $('#navMonth div').css('cursor','pointer');

            $('#navMonth div').click(function () {
                var month_data = $(this).attr('data-month');
                var m = moment([moment().year(), month_data, 1]);
                $('#navMonth div[data-month="'+ month_data +'"]').addClass('text-black bold').siblings().removeClass('text-black bold');
                $('#calendar').fullCalendar('gotoDate', m);
            });
            /*----------------------------------------------------*/
        });

        // save data from render or pull
        function edit(event){
            start = event.start.format('YYYY-MM-DD');
            if(event.end){
                end = event.end.format('YYYY-MM-DD');
            }else{
                end = start;
            }
            id =  event.id;
            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;
            $.ajax({
                url: '{{ url('api/calendar/full/update_pull') }}',
                type: 'get',
                dataType: 'json',
                data: {id:Event[0],start:Event[1],end:Event[2]},
                success: function(rep) {
                    if(rep == 'OK'){
                        $('body').pgNotification({
                            style: 'bar',
                            message: 'Successfully saved!',
                            position: 'top',
                            timeout: 1500,
                            type: 'info'
                        }).show();
                    }else{
                        //alert('Could not be saved. try again.');
                        $('body').pgNotification({
                            style: 'bar',
                            message: 'Could not be saved. try again.',
                            position: 'top',
                            timeout: 1500,
                            type: 'warning'
                        }).show();
                    }
                }
            });
        }

        // filter data
        function filterdata() {
            var langs = [];
            var idUser = $('[name="employee_search"]').val(); // id user name

            $('input[name="color-box"]:checked').each(function(){
                langs.push([this.value]); // for looping data checkbox
            });

            var events_new = '{{ url('api/calendar/full/getDate/holiday/') }}?id_user='+idUser+'&id_color='+langs; // make url with data filter


            /******* Get Title date for update default date ********/
            var getTitleDate = $('.fc-center h2').text();
            if(getTitleDate !== ''){
                var up = moment(getTitleDate).format('YYYY-MM-DD');
            }else{
                var up = '{{ date('Y-m-d') }}';
            }
            /*******************************************************/

            $('#calendar').fullCalendar('destroy'); // for reset setting fullcalendar

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today removeSource',
                    center: 'title',
                    right: ''
                },
                defaultDate: up,
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                contentHeight: '',
                //resourceEditable: true,
                select: function(start, end) {
                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
                    $('#ModalAdd #end').val('');
                    $('#ModalAdd').modal('show');
                    // datepicker in form input
                    $('.datepicker-component').datepicker('setStartDate',moment(start).format('YYYY-MM-DD'));
                    $('.datepicker-component').datepicker({
                        format: "yyyy-mm-dd",
                        orientation: "bottom auto",
                        autoclose: false,
                        toggleActive: true
                    });

                },
                eventRender: function(event, element, view ) {
                    // modal
                    element.bind('dblclick', function() {
                        $('#ModalEdit #form_update')[0].reset();
                        $('#ModalEdit #username').text(event.user);
                        $('#ModalEdit #id').val(event.id);
                        $('#ModalEdit #id_user').val(event.id_user);
                        $('#ModalEdit #title').val(event.title_edit);
                        //$('#ModalEdit #color').val(event.className);
                        $('#colors option').attr('selected',false);
                        var theValue = event.id_color;
                        $('#colors option[value="'+theValue+'"]').attr('selected',true);
                        $('#ModalEdit').modal('show');
                    });
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    edit(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    edit(event);
                },
                events: function( start, end, timezone, callback ) {  // alternative view 3
                    $.ajax({
                        url: events_new,
                        dataType: 'json',
                        success: function(doc) {
                            var events = [];
                            $(doc).find('event').each(function() {
                                events.push({
                                    title: $(this).attr('title'),
                                    start: $(this).attr('start')
                                });
                            });
                            callback(doc);
                        }
                    });
                }
            });

        }

        function update_data(){
            $.ajax({
                url: '{{ url('api/calendar/full/form_update') }}',
                type: 'get',
                dataType: 'json',
                data: $('#form_update').serialize(),
                success: function (result) {
                    $('#ModalEdit').modal('hide'); // hide modal edet
                    if(result){
                        filterdata(); // back to function for filter data

                        if(result == 'OK'){
                            $('body').pgNotification({ // notification true update
                                style: 'bar',
                                message: 'Successfully saved!',
                                position: 'top',
                                timeout: 1500,
                                type: 'info'
                            }).show();
                        }else if (result == 'DEL'){ // notification delete data
                            $('body').pgNotification({
                                style: 'bar',
                                message: 'Delete Success!',
                                position: 'top',
                                timeout: 1500,
                                type: 'info'
                            }).show();
                        }
                    }else{
                        $('body').pgNotification({ // notification false update
                            style: 'bar',
                            message: 'Could not be saved. try again.',
                            position: 'top',
                            timeout: 1500,
                            type: 'danger'
                        }).show();
                    }
                }
            });
        }
        
        function add_holiday() { // add data new
            $.ajax({
               url: '{{ url('api/calendar/full/add_data') }}',
               type: 'get',
               dataType: 'json',
               data: $('#form_addHoliday').serialize(),
               success: function (result) {
                   if(result){
                       filterdata(); // back to function for filter data
                       $('#ModalAdd').modal('hide'); // hide modal add
                       $('body').pgNotification({ // notification true input
                           style: 'bar',
                           message: 'Successfully saved!',
                           position: 'top',
                           timeout: 1500,
                           type: 'info'
                       }).show();
                   }else{
                       $('body').pgNotification({ // notification false input
                           style: 'bar',
                           message: 'Could not be saved. try again.',
                           position: 'top',
                           timeout: 1500,
                           type: 'danger'
                       }).show();
                   }
               }
            });
        }
    </script>
@endsection