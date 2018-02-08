<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />

    <link rel="stylesheet" href="{{ asset('app.vue' )}}">
    <link rel="stylesheet" href="{{ asset('temp/assets/plugins/data_style.css') }}">
    <link rel="stylesheet" href="{{ asset('temp/pages/css/pages_icons.css') }}">

    <!-- Date picker part -->
    <link rel="stylesheet" href="{{ asset('temp/assets/plugins/bootstrap-datepicker/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('temp/assets/plugins/bootstrap-datepicker/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('temp/assets/plugins/daterangespicker/daterangespicker.css') }}">
    <!--/ Date picker part -->

    <link rel="stylesheet" href="{{ asset('temp/pages/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('temp/pages/css/themes/corporate_temp.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        window.onload = function()
        {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
        }
    </script>
</head>
<body class="fixed-header menu-pin menu-behind">
<div class="login-wrapper " id="app">
    <!-- START Login Background Pic Wrapper-->
    <div class="bg-pic bg-success" style="/*background-image: url('{{ asset('temp/assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}'); */">
        <!-- START Background Pic-->
        <img src="{{ asset('temp/assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" alt="" class="lazy" style="opacity: .8;">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20" style="background: #000;opacity: 0.7;">
            <h2 class="semi-bold text-white">
                Pages make it easy to enjoy what matters the most in the life</h2>
            <p class="small">
                images Displayed are solely for representation purposes only, All work copyright of respective owner, otherwise © 2013-2014 REVOX.
            </p>
        </div>
        <!-- END Background Caption-->
    </div>
    <!-- END Login Background Pic Wrapper-->
    <!-- START Login Right Container-->
    <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-5 sm-p-r-15 sm-p-t-40">
            {{--<img src="{{ asset('temp/assets/img/logo.png') }}" alt="logo" width="78" height="22">--}}
            <h2>GxApp</h2>
            <p class="p-t-5">Sign into your pages account</p>
            <!-- START Login Form -->
            <form id="form-login" class="" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <!-- START Form Control-->
                <div class="form-group form-group-default">
                    <label>E-Mail Address</label>
                    <div class="controls">
                        <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail Address" class="form-control" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <!-- END Form Control-->
                <!-- START Form Control-->
                <div class="form-group form-group-default {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label>Password</label>
                    <div class="controls">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <!-- START Form Control-->
                <div class="row">
                    <div class="col-md-6 no-padding sm-p-l-10">
                        <div class="checkbox ">
                            <input type="checkbox" id="checkbox1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="checkbox1">Remember Me</label>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <a href="#" class="text-danger small getmodal-report" data-target="#modalSlideLeft" data-toggle="modal">Report ? Software error</a>
                    </div>
                </div>
                <!-- END Form Control-->
                <button class="btn btn-primary btn-cons m-t-10" type="submit">Sign in</button>
            </form>
            <!--END Login Form-->

            <div class="pull-bottom sm-pull-bottom">
                <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
                    <div class="col-sm-3 col-md-2 no-padding">
                        <img alt="" class="m-t-5" height="60" src="{{ asset('temp/assets/img/demo/pages_icon.png') }}" width="60">
                    </div>
                    <div class="col-sm-9 no-padding m-t-10">
                        <p>
                            <small>
                                Create a pages account. If you have a facebook account, log into it for this
                                process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#" class="text-info">Google</a>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Login Right Container-->
</div>

<!-- START OVERLAY -->
<div class="overlay hide" data-pages="search">
    <!-- BEGIN Overlay Content !-->
    <div class="overlay-content has-results m-t-20">
        <!-- BEGIN Overlay Header !-->
        <div class="container-fluid">
            <!-- BEGIN Overlay Logo !-->
            <img class="overlay-brand" src="{{ asset('temp/assets/img/logo.png') }}" alt="logo" width="78" height="22">
            <!-- END Overlay Logo !-->
            <!-- BEGIN Overlay Close !-->
            <a href="#" class="close-icon-light overlay-close text-black fs-16">
                <i class="pg-close"></i>
            </a>
            <!-- END Overlay Close !-->
        </div>
        <!-- END Overlay Header !-->
        <div class="container-fluid">
            <!-- BEGIN Overlay Controls !-->
            <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
            <br>
            <div class="inline-block">
                <div class="checkbox right">
                    <input id="checkboxn" type="checkbox" value="1" checked="checked">
                    <label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
                </div>
            </div>
            <div class="inline-block m-l-10">
                <p class="fs-13">Press enter to search</p>
            </div>
            <!-- END Overlay Controls !-->
        </div>
        <!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
        <div class="container-fluid">
          <span>
                <strong>suggestions :</strong>
            </span>
            <span id="overlay-suggestions"></span>
            <br>
            <div class="search-results m-t-40">
                <p class="bold">Pages Search Results</p>
                <div class="row">
                    <div class="col-md-6">
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div>
                                    <img width="50" height="50" src="{{ asset('temp/assets/img/profiles/avatar.jpg') }}" alt="">
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>
                                <p class="hint-text">via john smith</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div>T</div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related topics</h5>
                                <p class="hint-text">via pages</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div><i class="fa fa-headphones large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>
                                <p class="hint-text">via pagesmix</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                    </div>
                    <div class="col-md-6">
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
                                <div><i class="fa fa-facebook large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook</h5>
                                <p class="hint-text">via facebook</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">
                                <div><i class="fa fa-twitter large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
                                <p class="hint-text">via twitter</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">
                                <div><i class="fa fa-google-plus large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
                                <p class="hint-text">via google plus</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Overlay Search Results !-->
    </div>
    <!-- END Overlay Content !-->
</div>
<!-- END OVERLAY -->


<!-- MODAL FORM REPORT DATA ERROR -->
<div class="modal fade slide-right" id="modalSlideLeft" tabindex="-1"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                <div class="container-xs-height full-height">
                    <div class="row-xs-height">
                      <form action="#" method="post" id="formReport">
                        <div class="modal-body /*col-xs-height col-middle*/ padding-20">
                            <h3 class="text-danger text-center"><span class="semi-bold">Report Software Error</span></h3>
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label class="">Select User Name</label>
                                <select class="full-width listusername" name="idUser" data-placeholder="Select User" data-init-plugin="select2">
                                </select>
                            </div>
                            <div class="form-group form-group-default required">
                                <label>Password</label>
                                <input type="password" class="form-control" name="passwordCek" placeholder="password" required>
                            </div>
                            <div class="form-group form-group-default required">
                                <label>Notes Report</label>
                                <textarea id="summernote" name="notes"></textarea>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-danger btn-cons m-t-10" type="button" onclick="sendReport()">Send</button>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/ MODAL FORM REPORT DAT ERROR -->


<script src="{{ asset('app.vue' ) }}"></script>

<script src="{{ asset('temp/assets/plugins/data_plugins.js') }}"></script>

<script src="{{ asset('temp/pages/js/data_js.js') }}"></script>

<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('temp/assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->

<!-- picker date, ranges, and time -->
<script src="{{ asset('temp/assets/plugins/bootstrap-datepicker/datepicker.js') }}"></script>
<script src="{{ asset('temp/assets/plugins/daterangespicker/daterangespicker.js') }}"></script>
<script src="{{ asset('temp/assets/plugins/datetimepicker/datetimepicker.js') }}"></script>
<!-- end picker date, ranges, and time -->

<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('temp/assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('temp/assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->

<script>
    $(document).ready(function(){
        // ajax header
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.listusername , .select2').click(function () {
            $('.select2-dropdown').css('z-index','100000000');
        });

        $.ajax({
           url: '{{ url('api/listUser') }}',
           type: 'get',
           dataType: 'json',
           success: function (res){
                $('.listusername').html('');
                $('.listusername').append('<option value=""></option>');
                for(var i = 0;i < res.length; i++){
                    $('.listusername').append('<option value="'+res[i].id+'">'+res[i].name+'</option>');
                }
           }
        });
    });

    function sendReport(){
        var idUser = $('[name="idUser"]').val();
        var pass   = $('[name="passwordCek"]').val();
        var notes = $('[name="notes"]').code();

        $.ajax({
            url: '{{ url('api/report/send') }}',
            type: 'post',
            dataType: 'json',
            data: {'id':idUser,'pass':pass,'notes':notes},
            success: function (res) {
                console.log(res)
                if(res == 1){
                    $('#modalSlideLeft').modal('hide'); // hide modal add
                    $("#formReport")[0].reset();
                    $('#summernote').code('');
                    $('body').pgNotification({ // notification true input
                        style: 'flip bar',
                        message: 'Successfully!',
                        position: 'top-right',
                        timeout: 1500,
                        type: 'success'
                    }).show();
                    $('.pgn-wrapper').css('z-index','10000');
                }else{
                    $('body').pgNotification({ // notification false input
                        style: 'flip bar',
                        message: 'Try again! your name and password not suitable',
                        position: 'top-right',
                        timeout: 2500,
                        type: 'danger'
                    }).show();
                    $('.pgn-wrapper').css('z-index','10000');
                }
            },error:function(){
                alert("error!!!!");
            }
        });
    }
</script>

</body>
</html>