@extends('layouts.master_admin')

@section('title','Employee - Medical Records')

@push('vueApp')
<script src="{{ asset('js/clientMain/employee/medicalRecords.js') }}"></script>
@endpush

@section('content')
    <div class="content sm-gutter" id="app">
        <div class="container-fluid">
            <ul class="breadcrumb p-l-0">
                <li class="breadcrumb-item"><a href="#">Employee</a></li>
                <li class="breadcrumb-item active">Medical Records</li>
            </ul>
        </div>

        <div class="container full-width container-fluid container-fixed-lg">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <div class="card-title">Medical Records</div>
                        </div>
                        <div class="card-block">
                            <div class="row">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">

                                    <div class="col-md-4">
                                        <div class="">
                                            <p>Longterm medication</p>
                                            <div class="radio radio-success">
                                                <input type="radio" value="1" name="treatmentLong" id="treatment-on">
                                                <label for="treatment-on">Yes</label>
                                                <input type="radio" value="0" name="treatmentLong" checked="checked" id="treatment-off">
                                                <label for="treatment-off">No</label>
                                            </div>
                                        </div>
                                        <div class="row  padding-5 form-group form-group-attached" id="treatmentQuestion" style="display: none;">
                                            <div class="form-group form-group-default required">
                                                <label class="label-sm">Type of disease</label>
                                                <input type="text"  class="form-control" placeholder="Type of disease" required>
                                            </div>
                                            <div class="form-group form-group-default required">
                                                <label class="label-sm">Since When</label>
                                                <input type="text"  readonly class="form-control datepickerGet" placeholder="dd/mm/yyyy" required>
                                            </div>
                                            <div class="form-group form-group-default required">
                                                <label class="col-form-label-sm">Type of drug</label>
                                                <input type="text"  class="form-control" placeholder="Type of drug" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="">
                                            <p>You are a Smoker </p>
                                            <div class="radio radio-success">
                                                <input type="radio" value="1" name="smoker" id="smoker-on">
                                                <label for="smoker-on">Yes</label>
                                                <input type="radio" value="0" name="smoker" checked="checked" id="smoker-off">
                                                <label for="smoker-off">No</label>
                                            </div>
                                        </div>
                                        <div class="form-group-attached padding-5" id="smokerQuestion" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group form-group-default required">
                                                        <label class="label-sm">Amount</label>
                                                        <input type="number" class="form-control" placeholder="Amount" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group form-group-default required">
                                                        <label class="label-sm">Dose</label>
                                                        <select class="form-control">
                                                            <option >- Option -</option>
                                                            <option value="Cigarettes">Cigarettes</option>
                                                            <option value="Day">Day</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default required">
                                                        <label class="label-sm">Since When</label>
                                                        <input type="text"  readonly class="form-control datepickerGet" placeholder="dd/mm/yyyy" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="">
                                            <p>You are a Drinker </p>
                                            <div class="radio radio-success">
                                                <input type="radio" value="1" name="drinker" id="drinker-on">
                                                <label for="drinker-on">Yes</label>
                                                <input type="radio" value="0" name="drinker" checked="checked" id="drinker-off">
                                                <label for="drinker-off">No</label>
                                            </div>
                                        </div>
                                        <div class="form-group-attached padding-5" id="drinkerQuestion" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group form-group-default required">
                                                        <label class="label-sm">Amount</label>
                                                        <input type="number" class="form-control" placeholder="Amount" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group form-group-default required">
                                                        <label class="label-sm">Dose</label>
                                                        <select class="form-control">
                                                            <option >- Option -</option>
                                                            <option value="Bottle">Bottle</option>
                                                            <option value="Day">Day</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default required">
                                                        <label class="label-sm">Since When</label>
                                                        <input type="text"  readonly class="form-control datepickerGet" placeholder="dd/mm/yyyy" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default required">
                                                        <label class="label-sm">Type of Drinker</label>
                                                        <input type="text"  class="form-control" placeholder="Type of drinker" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                  </div>
                                    <hr/>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="">
                                                <p>Had an Accident</p>
                                                <div class="radio radio-success">
                                                    <input type="radio" value="1" name="accident" id="accident-on">
                                                    <label for="accident-on">Yes</label>
                                                    <input type="radio" value="0" name="accident" checked="checked" id="accident-off">
                                                    <label for="accident-off">No</label>
                                                </div>
                                            </div>

                                            <div class="form-group-attached padding-5" id="accidentQuestion" style="display: none;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Since When</label>
                                                            <input type="text"  readonly class="form-control datepickerGet" placeholder="dd/mm/yyyy" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Type of Accident</label>
                                                            <input type="text"  class="form-control" placeholder="Type of Accident" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="">
                                                <p>Experienced Operation</p>
                                                <div class="radio radio-success">
                                                    <input type="radio" value="1" name="operation" id="operation-on">
                                                    <label for="operation-on">Yes</label>
                                                    <input type="radio" value="0" name="operation" checked="checked" id="operation-off">
                                                    <label for="operation-off">No</label>
                                                </div>
                                            </div>

                                            <div class="form-group-attached padding-5" id="operationQuestion" style="display: none;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Since When</label>
                                                            <input type="text"  readonly class="form-control datepickerGet" placeholder="dd/mm/yyyy" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Type of Operation</label>
                                                            <input type="text"  class="form-control" placeholder="Type of Operation" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="">
                                                <p>Hospitalized</p>
                                                <div class="radio radio-success">
                                                    <input type="radio" value="1" name="hospitalized" id="hospitalized-on">
                                                    <label for="hospitalized-on">Yes</label>
                                                    <input type="radio" value="0" name="hospitalized" checked="checked" id="hospitalized-off">
                                                    <label for="hospitalized-off">No</label>
                                                </div>
                                            </div>

                                            <div class="form-group-attached padding-5" id="hospitalizedQuestion" style="display: none;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Since When</label>
                                                            <input type="text"  readonly class="form-control datepickerGet" placeholder="dd/mm/yyyy" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Type of Operation</label>
                                                            <input type="text"  class="form-control" placeholder="Type of  Operation" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Special History</p>

                                            <div class="form-group-attached padding-5" id="accidentQuestion">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Dietary habit</label>
                                                            <input type="text" class="form-control" placeholder="Dietary habit" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Type of sport</label>
                                                            <input type="text"  class="form-control" placeholder="Type of sport" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Regular exercise habits</label>
                                                            <input type="text" class="form-control" placeholder="Regular exercise habits" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Frequency of sports</label>
                                                            <input type="text" class="form-control" placeholder="Regular exercise habits" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Notes etc</label>
                                                            <textarea rows="15" placeholder="Notes etc" class="form-control" style="width: 100%;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <p>Other Information</p>

                                            <div class="form-group-attached padding-5">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Body Height</label>
                                                            <input type="text" class="form-control" placeholder="Body Height" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr/>
                                            <div class="">
                                                <p>Do you use glasses</p>
                                                <div class="radio radio-success">
                                                    <input type="radio" value="1" name="glasses" id="glasses-on">
                                                    <label for="glasses-on">Yes</label>
                                                    <input type="radio" value="0" name="glasses" checked="checked" id="glasses-off">
                                                    <label for="glasses-off">No</label>
                                                </div>
                                            </div>

                                            <div class="form-group-attached padding-5" id="glassesQuestion" style="display: none;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default required">
                                                            <label class="label-sm">Size of glasses</label>
                                                            <input type="text" class="form-control" placeholder="Size of glasses" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
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
            $('.datepickerGet').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true
            });

            $('[name="treatmentLong"]').click(function () {
                var treatmentLong = $(this).val();
                var outDis = '';
                if (treatmentLong == false) {
                    outDis = 'none';
                }
                $('#treatmentQuestion').css({'display':outDis});
            });

            $('[name="smoker"]').click(function () {
                var smokerVal = $(this).val();
                var outDisSmoker = '';
                if(smokerVal == false){
                    outDisSmoker = 'none';
                }
                $('#smokerQuestion').css({'display':outDisSmoker});
            });

            $('[name="drinker"]').click(function () {
               var drinkerVal = $(this).val();
               var outDisDrinker = '';
               if(drinkerVal == false){
                   outDisDrinker = 'none';
               }
               $('#drinkerQuestion').css({'display':outDisDrinker});
            });

            $('[name="accident"]').click(function () {
               var accidentVal = $(this).val();
               var outDisAccident = '';
               if(accidentVal == false){
                   outDisAccident = 'none';
               }
               $('#accidentQuestion').css({'display':outDisAccident});
            });

            $('[name="operation"]').click(function () {
               var operationVal = $(this).val();
                var outDisOperation = '';
               if(operationVal == false){
                   outDisOperation = 'none';
               }
               $('#operationQuestion').css({'display':outDisOperation});
            });

            $('[name="hospitalized"]').click(function () {
               var hospitalizedVal = $(this).val();
                var outDisHospitaled = '';
               if(hospitalizedVal == false){
                   outDisHospitaled = 'none';
               }
               $('#hospitalizedQuestion').css({'display':outDisHospitaled});
            });

            $('[name="glasses"]').click(function () {
                var glassesVal = $(this).val();
                var outDisGlasses = '';
                if(glassesVal == false){
                    outDisGlasses = 'none';
                }
                $('#glassesQuestion').css({'display':outDisGlasses});
            });


        });
    </script>
@endsection