<template>
    <div class="container full-width container-fluid container-fixed-lg">
        <div class="row">
            <div class="col-md-12 m-b-20">
                <router-link class="btn btn-default btn-cons text-primary" to="/"><i class="pg-arrow_left"></i>Go Back</router-link>
                <button class="btn btn-primary">Save</button>
            </div>

            <!-- START card VEHICLE INFORMATION -->
            <div class="col-lg-4">
                <div class="card card-default">
                    <div class="card-header ">
                        <div class="card-title">Vehicle Information</div>
                    </div>
                    <div class="card-block">
                        <div class="form-group">
                            <span class="help">PLATE NUMBER</span>
                            <input type="text" class="form-control" placeholder="Plate Number" required>
                        </div>
                        <div class="form-group">
                            <span class="help">VEHICLE TYPE</span>
                            <select class="full-width select2-hidden-accessible" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                <option value="">Select Type</option>
                                <option value="1">CAR</option>
                                <option value="2">MOTORCYCLE</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <span class="help">DIVISION</span>
                            <select class="full-width select2-hidden-accessible" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                <option value="">Select Division</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <span class="help">PORT</span>
                            <select class="full-width select2-hidden-accessible" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                <option value="">Select Port</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <span class="help">PURCHASE DATE</span>
                            <input type="text" class="form-control datepicker-component" data-date-format="dd-mm-yyyy" placeholder="DD/MM/YYYY" readonly required>
                        </div>
                        <div class="form-group">
                            <span class="help">RECEIVED DATE</span>
                            <input type="text" class="form-control datepicker-component" data-date-format="dd-mm-yyyy" placeholder="DD/MM/YYYY" readonly required>
                        </div>
                        <div class="form-group">
                            <span class="help">KM DATA</span>
                            <input type="number" class="form-control" placeholder="Km Data" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card VEHICLE INFORMATION -->

            <!-- START card VEHICLE INFORMATION -->
            <div class="col-lg-4">
                <div class="card card-default">
                    <div class="card-header ">
                        <div class="card-title">Vehicle Stnk</div>
                    </div>
                    <div class="card-block">
                        <div class="form-group">
                            <span class="help">BRAND</span>
                            <input type="text" class="form-control" placeholder="Plate Number" required>
                        </div>
                        <div class="form-group">
                            <span class="help">ASSEMBLY YEAR</span>
                            <input type="text" class="form-control" placeholder="Assembly Year" required>
                        </div>
                        <div class="form-group">
                            <span class="help">CHASSIS NUMBER</span>
                            <input type="text" class="form-control" placeholder="Chassis No" required>
                        </div>
                        <div class="form-group">
                            <span class="help">MACHINE NO</span>
                            <input type="text" class="form-control" placeholder="Machine No" required>
                        </div>
                        <div class="form-group">
                            <span class="help">MODEL TYPE</span>
                            <input type="text" class="form-control" placeholder="Model Type" required>
                        </div>
                        <div class="form-group">
                            <span class="help">FUEL</span>
                            <input type="text" class="form-control" placeholder="Fuel" required>
                        </div>
                        <div class="form-group">
                            <span class="help">COLOR</span>
                            <input type="color" class="form-control" placeholder="Color" required>
                        </div>
                        <div class="form-group">
                            <span class="help">VALID DATE</span>
                            <input type="text" class="form-control" placeholder="Valid Date" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card VEHICLE INFORMATION -->

        </div>
    </div>
</template>

<script>
    export default{

    }
</script>