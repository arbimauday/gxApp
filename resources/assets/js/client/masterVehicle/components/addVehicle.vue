<template>
    <div class="container full-width container-fluid container-fixed-lg">
        <div class="row">
            <div class="col-md-12 m-b-20">
                <router-link class="btn btn-default btn-cons text-primary" to="/"><i class="pg-arrow_left"></i>Go Back</router-link>
                <button class="btn btn-primary" @click="addVehicle()">Save</button>
            </div>

            <!-- START card VEHICLE INFORMATION -->
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title">Vehicle Information</div>
                    </div>
                    <div class="card-block">
                      <div class="row">
                          <div class="form-group col-md-4">
                              <span class="help">PLATE NUMBER <b class="text-danger">*</b></span>
                              <input type="text" class="form-control" placeholder="Plate Number" v-model="inputData.plateNumber">
                          </div>
                          <div class="form-group col-md-4">
                              <span class="help">VEHICLE TYPE <b class="text-danger">*</b></span>
                              <select class="full-width form-control" v-model="inputData.vehicleTypeId">
                                  <option value="">Chose Type</option>
                                  <option value="1">CAR</option>
                                  <option value="2">MOTORCYCLE</option>
                              </select>
                          </div>
                          <div class="form-group col-md-4">
                              <span class="help">DIVISION <b class="text-danger">*</b></span>
                              <select class="full-width form-control" name="Division"  v-model="inputData.divisionId">
                                  <option value="">Chose Division</option>
                                  <option v-for="outDv in divisions" v-bind:value="outDv.id">{{ outDv.division }}</option>
                              </select>
                          </div>
                          <div class="form-group col-md-4">
                              <span class="help">PURCHASE DATE <b class="text-danger">*</b></span>
                              <!--<input type="text" class="form-control datePurchase" readonly name="datePurchase" placeholder="DD/MM/YYYY">-->
                              <datepicker-get name="datePurchase"></datepicker-get>
                          </div>
                          <div class="form-group col-md-4">
                              <span class="help">RECEIVED DATE <b class="text-danger">*</b></span>
                              <!--<input type="text" class="form-control datePurchase" readonly  placeholder="DD/MM/YYYY">-->
                              <datepicker-get name="receivedDate"></datepicker-get>
                          </div>
                          <div class="form-group col-md-4">
                              <span class="help">KM DATA <b class="text-danger">*</b></span>
                              <input type="number" name="Km Data" min="0" class="form-control" placeholder="Km Data" v-model="inputData.kilometerData">
                          </div>
                      </div>
                    </div>
                </div>
            </div>
            <!-- END card VEHICLE INFORMATION -->
        </div>
    </div>
</template>

<script>
    import datepickerget from './datepickerDatepurchase.vue'

    export default{
        components: {'datepicker-get' :datepickerget},
        data(){
            return{
                inputData:{
                    plateNumber : '',
                    vehicleTypeId : '',
                    divisionId : '',
                    //purchasedDate : new Date($.now()).getDate()+'/'+(new Date($.now()).getMonth()+1)+'/'+new Date($.now()).getFullYear(),
                    //receivedDate : new Date($.now()).getDate()+'/'+(new Date($.now()).getMonth()+1)+'/'+new Date($.now()).getFullYear(),
                    purchasedDate: '',
                    receivedDate: '',
                    kilometerData : ''
                },
                newDate : new Date($.now()).getDate()+'/'+(new Date($.now()).getMonth()+1)+'/'+new Date($.now()).getFullYear() // get date now
            }
        },
        computed:{
            divisions(){
                this.$store.getters.getDivision;
                return this.$store.state.getDataDivision;
            }
        },
        methods : {
            addVehicle(){
                this.inputData.purchasedDate = $('[name="datePurchase"]').val(); //convert data to name v-model
                this.inputData.receivedDate = $('[name="receivedDate"]').val(); //convert data to name v-model

                axios.post('../api/masterVehicle/addVehicle',this.$data.inputData)
                .then((response) => {
                  $('body').pgNotification({
                    style: 'flip',
                    message: 'Successfully saved!',
                    position: 'top-right',
                    timeout: 1500,
                    type: 'success'
                  }).show();
                  this.resetDataInput();
                  this.$router.push('/')
                })
                .catch((error) => {
                  $('body').pgNotification({
                   style: 'flip',
                   message: 'Please fill it correctly, Try again!',
                   position: 'top-right',
                   html: true,
                   timeout: 1900,
                   type: 'error'
                  }).show();
                })
            },
            resetDataInput(){
                this.inputData={
                    plateNumber : '',
                    vehicleTypeId : '',
                    divisionId : '',
                    purchasedDate: '',
                    receivedDate: '',
                    kilometerData : ''
                }
                $('[name="datePurchase"]').val(''); //convert data to name v-model
                $('[name="receivedDate"]').val(''); //convert data to name v-model
            }
        }
    }
</script>