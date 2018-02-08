<template>
    <div class="container full-width container-fluid container-fixed-lg">
        <div class="row">

            <div class="col-md-12 m-b-20">
                <router-link class="btn btn-default btn-cons text-primary" to="/"><i class="pg-arrow_left"></i>Go Back</router-link>
                <router-link class="btn btn-primary btn-cons" :to="urlGalleryImg"><i class="fa fa-file-image-o"></i> Gallery Images</router-link>
            </div>

            <!-- START CARD VEHICLE INFORMATION -->
            <div class="col-lg-6">
                <div data-pages="card" class="card card-default ">
                    <div class="card-header">
                        <div class="card-title">Vehicle Information</div>
                        <div class="card-controls">
                            <ul>
                                <li v-if="disableEditInfo">
                                    <a data-toggle="refresh" style="color: #ee0000!important;" class="card-refresh actionBtnEdit" href="#" @click="actionInfo(false)"><i class="fa fa-edit"></i> Edit</a>
                                </li>
                                <li v-else>
                                    <a data-toggle="refresh" style="color: #ee0000!important;" class="card-collapse actionBtnEdit" href="#" @click="actionInfo('cancel')"><i class="fa fa-times-circle-o"></i> Cancel</a>
                                </li>
                                <li v-if="disableEditInfo == false">
                                    <a data-toggle="refresh" style="color: #39b400!important;" class="card-refresh actionBtnSave" href="#" @click="actionInfo('update')"><i class="fa fa-check-square-o"></i> Save</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block" v-for="ui in dataInfo">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Plate Number</label>
                                    <input class="form-control" :readonly="disableEditInfo == true" type="text" v-model="ui.plateNumber">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Division</label>
                                    <select class="full-width" style="border:0px" v-model="ui.divisionId" :disabled="disableEditInfo == true">
                                        <option v-for="outDv in divisions" v-bind:value="outDv.id" :selected="outDv.id == ui.divisionId">{{ outDv.division }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Purchased Date</label>
                                    <datepicker-get name="purchasedDate" :disabled="disableEditInfo == true" :value="ui.purchasedDate"></datepicker-get>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Received Date</label>
                                    <datepicker-get name="receivedDate" :disabled="disableEditInfo == true" :value="ui.receivedDate"></datepicker-get>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Km Data</label>
                                    <input class="form-control" :readonly="disableEditInfo == true" type="number" v-model="ui.kilometerData">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CARD VEHICLE INFORMATION -->

            <!-- START CARD VEHICLE INSURANCES -->
            <div class="col-lg-6">
                <div data-pages="card" class="card card-default ">
                    <div class="card-header">
                        <div class="card-title">Vehicle Insurances</div>
                        <div class="card-controls">
                            <ul>
                                <li v-if="disableEditInsurances">
                                    <a data-toggle="refresh" style="color: #ee0000!important;" class="card-refresh actionBtnEdit" href="#" @click="actionInsurances(false)"><i class="fa fa-edit"></i> Edit</a>
                                </li>
                                <li v-else>
                                    <a data-toggle="refresh" style="color: #ee0000!important;" class="card-colapse actionBtnEdit" href="#" @click="actionInsurances('cancel')"><i class="fa fa-times-circle-o"></i> Cancel</a>
                                </li>
                                <li v-if="disableEditInsurances == false">
                                    <a data-toggle="refresh" style="color: #39b400!important;" class="card-refresh actionBtnSave" href="#" @click="actionInsurances('update')"><i class="fa fa-check-square-o"></i> Save</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block" v-for="is in dataInsurances">
                        <div class="row">
                            <div class="form-group-default">
                                <label>Name Type</label>
                                <input type="text" placeholder="Name Type" class="form-control" :readonly="disableEditInsurances == true" v-model="is.name">
                            </div>
                            <div class="form-group-default">
                                <label>Due Date</label>
                                <datepicker-get name="dueDate" :value="is.dueDate" :disabled="disableEditInsurances == true"></datepicker-get>
                            </div>
                            <div class="form-group-default">
                                <label>Nominal</label>
                                <input type="number" placeholder="000000" class="form-control" :readonly="disableEditInsurances == true" v-model="is.nominal">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CARD VEHICLE INSURANCES -->

            <!-- START CARD VEHICLE STNK -->
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title">Vehicle STNK</div>
                        <div class="card-controls">
                            <ul>
                                <li v-if="disableEditStnk">
                                    <a data-toggle="refresh" style="color: #ee0000!important;" class="card-refresh actionBtnEdit" href="#" @click="actionStnk(false)"><i class="fa fa-edit"></i> Edit</a>
                                </li>
                                <li v-else>
                                    <a data-toggle="refresh" style="color: #ee0000!important;" class="card-colapse actionBtnEdit" href="#" @click="actionStnk('cancel')"><i class="fa fa-times-circle-o"></i> Cancel</a>
                                </li>
                                <li v-if="disableEditStnk == false">
                                    <a data-toggle="refresh" style="color: #39b400!important;" class="card-refresh actionBtnSave" href="#" @click="actionStnk('update')"><i class="fa fa-check-square-o"></i> Save</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block" v-for="us in dataStnk">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Brand</label>
                                    <input type="text" placeholder="Brand" class="form-control" :readonly="disableEditStnk == true" v-model="us.brand">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Assembly Year</label>
                                    <yearpicker-get name="assemblyYear" :disabled="disableEditStnk == true" :value="us.assemblyYear"></yearpicker-get>
                                    <!--<input type="text" placeholder="YYYY" class="form-control" :readonly="disableEditStnk == true" v-model="us.assemblyYear">-->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Chassis No</label>
                                    <input type="text" placeholder="0000000000000000" class="form-control" :readonly="disableEditStnk == true" v-model="us.chassisNo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Machine No</label>
                                    <input type="text" placeholder="0000000000000000" class="form-control" :readonly="disableEditStnk == true" v-model="us.machineNo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Model Type</label>
                                    <input type="text" class="form-control" :readonly="disableEditStnk == true" v-model="us.modelType">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Fuel</label>
                                    <input type="text" placeholder="Fuel" class="form-control" :readonly="disableEditStnk == true" v-model="us.fuel">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Color</label>
                                    <input type="text" placeholder="Color" class="form-control" :readonly="disableEditStnk == true" v-model="us.color">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-default">
                                    <label>Valid Date</label>
                                    <datepicker-get name="validDate" :value="us.validDate"></datepicker-get>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CARD VEHICLE STNK -->

            <!-- START CARD VEHICLE KIR -->
            <div class="col-lg-6"  v-for="ik in dataKir" v-if="ik.chekingUseOrNot == 1">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title">Vehicle Book Kir</div>
                        <div class="card-controls">
                            <ul>
                                <li v-if="disableEditKir">
                                    <a data-toggle="refresh" style="color: #ee0000!important;" class="card-refresh actionBtnEdit" href="#" @click="actionKir(false)"><i class="fa fa-edit"></i> Edit</a>
                                </li>
                                <li v-else>
                                    <a data-toggle="refresh" style="color: #ee0000!important;" class="card-colapse actionBtnEdit" href="#" @click="actionKir('cancel')"><i class="fa fa-times-circle-o"></i> Cancel</a>
                                </li>
                                <li v-if="disableEditKir == false">
                                    <a data-toggle="refresh" style="color: #39b400!important;" class="card-refresh actionBtnSave" href="#" @click="actionKir('update')"><i class="fa fa-check-square-o"></i> Save</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="form-group-default">
                                <label>Owner Name</label>
                                <input type="text" class="form-control" :readonly="disableEditKir == true" v-model="ik.ownerName">
                            </div>
                            <div class="form-group-default">
                                <label>Owner Address</label>
                                <input tyep="text" class="form-control" :readonly="disableEditKir == true" v-model="ik.ownerAddress">
                            </div>
                            <div class="form-group-default">
                                <label>Periodic Test Number</label>
                                <input tyep="text" class="form-control" :readonly="disableEditKir == true" v-model="ik.periodicTestNumber">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CARD VEHICLE KIR -->

            <!-- START CARD LIST IMAGES -->
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title">Gallery Images <router-link :to="urlGalleryImg" class="m-l-5" style="color:rgb(52, 0, 255) !important">See More..</router-link></div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <lightbox :images="images" :caption="true" :nav="true" :resetstyles="false" id="dataListImg"></lightbox>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CARD LIST IMAGES -->

        </div>
    </div>
</template>

<script>
    import datepickerget from './datepickerDatepurchase.vue'
    import yearpickerGet from './yearpickerGet.vue'

    export default{
        components: {
            'datepicker-get' :datepickerget,
            'yearpicker-get':yearpickerGet
        },
        data(){
            return{
                dataInfo: {},
                disableEditInfo: true,
                dataStnk: {},
                disableEditStnk: true,
                dataInsurances: {},
                disableEditInsurances: true,
                dataKir: {},
                disableEditKir: true,
                urlGalleryImg: '',
                images: [],
            }
        },
        created:function (){
//            console.log( this.$route.params.id ) // get data from router
//            console.log( this.$route.params.plateNumber ) // get data from router
            this.getDataView();
        },
        computed:{
            divisions(){
                this.$store.getters.getDivision;
                return this.$store.state.getDataDivision;
            }
        },
        watch:{
          '$route': 'getDataView'
        },
        methods:{
          getDataView(){

              this.urlGalleryImg = '/viewDetail/galleryImg/'+this.$route.params.id+'/'+this.$route.params.plateNumber;

              this.disableEditInfo = true;
              this.disableEditInsurances = true;
              this.disableEditStnk = true;
              this.disableEditKir = true;

              axios.get(`../api/masterVehicle/viewDetail?id=${this.$route.params.id}`)
              .then((response) => {
                  this.dataInfo = response.data.dataInfo; // get data from master vehicle
                  this.dataStnk = response.data.dataStnk; // get data from vehicle Stnk
                  this.dataInsurances = response.data.dataInsurances; // get data from vehicle Insurances
                  this.dataKir  = response.data.dataKir; // get data from vehicle Kir
                  this.images   = response.data.images;  // get data from vehicle images
                  this.idCssListImg(); // running css list images
              })
          },
          actionInfo(action){
              if(action == 'update'){
                  this.convertInfo = {
                      'id'              : this.$route.params.id,
                      'plateNumber'     : this.dataInfo[0].plateNumber,
                      'divisionId'      : this.dataInfo[0].divisionId,
                      'portId'          : this.dataInfo[0].portId,
                      'purchasedDate'   : $('[name="purchasedDate"]').val(),
                      'receivedDate'    : $('[name="receivedDate"]').val(),
                      'kilometerData'   : this.dataInfo[0].kilometerData
                  }
                  var updateInfo = this.convertInfo;

                  axios.post('../api/masterVehicle/updateInfo', updateInfo)
                  .then((response) => {
                      this.getDataView();
                      $('body').pgNotification({
                          style: 'flip',
                          message: 'Successfully saved!',
                          position: 'top-right',
                          timeout: 1000,
                          type: 'success'
                      }).show();
                  })
                  .catch((error) => {
                      $('body').pgNotification({
                          style: 'bar',
                          message: 'Try again!, Incomplete data',
                          position: 'top',
                          timeout: 1000,
                          type: 'danger'
                      }).show();
                  })
              }else if (action == 'cancel'){
                  this.getDataView();
              }else{
                  this.disableEditInfo = action;
              }
          },
          actionInsurances(action){
              if(action == 'update'){
                  this.convertInsurances = {
                      'id'      : this.$route.params.id,
                      'name'    : this.dataInsurances[0].name,
                      'dueDate' : $('[name="dueDate"]').val(),
                      'nominal' : this.dataInsurances[0].nominal
                  }
                  var updateInsurances = this.convertInsurances;

                  axios.post('../api/vehicleInsurances/updateData', updateInsurances)
                  .then((response) => {
                      this.getDataView();
                      $('body').pgNotification({
                          style: 'flip',
                          message: 'Successfully saved!',
                          position: 'top-right',
                          timeout: 1000,
                          type: 'success'
                      }).show();
                  })
                  .catch((error) => {
                      $('body').pgNotification({
                          style: 'flip',
                          message: 'Try again!, incomplete data',
                          position: 'top-right',
                          timeout: 1000,
                          type: 'danger'
                      }).show();
                  })
              }else if(action == 'cancel'){
                  this.getDataView();
              }else{
                  this.disableEditInsurances = action;
              }
          },
          actionStnk(action){
              if(action == 'update'){
                  this.convertStnk = {
                      'id'     : this.$route.params.id,
                      'brand'         : this.dataStnk[0].brand,
                      'assemblyYear'  : $('[name="assemblyYear"]').val(),
                      'chassisNo'     : this.dataStnk[0].chassisNo,
                      'machineNo'     : this.dataStnk[0].machineNo,
                      'modelType'     : this.dataStnk[0].modelType,
                      'fuel'          : this.dataStnk[0].fuel,
                      'color'         : this.dataStnk[0].color,
                      'validDate'     : $('[name="validDate"]').val()
                  }
                  var updateStnk = this.convertStnk;

                  axios.post('../api/vehicleStnk/updateData', updateStnk)
                      .then((response) => {
                          this.getDataView();
                          $('body').pgNotification({
                              style: 'flip',
                              message: 'Successfully saved!',
                              position: 'top-right',
                              timeout: 1000,
                              type: 'success'
                          }).show();
                      })
                      .catch((error) => {
                          $('body').pgNotification({
                              style: 'flip',
                              message: 'Try again!, incomplete data',
                              position: 'top-right',
                              timeout: 1000,
                              type: 'danger'
                          }).show();
                      })
              }else if(action == 'cancel'){
                  this.getDataView();
              }else{
                  this.disableEditStnk = action;
              }
          },
          actionKir(action){
              if(action == 'update'){
                  this.convertKir = {
                      'id'     : this.$route.params.id,
                      'ownerName'   : this.dataKir[0].ownerName,
                      'ownerAddress'    : this.dataKir[0].ownerAddress,
                      'periodicTestNumber'  : this.dataKir[0].periodicTestNumber
                  }
                  var updateKir = this.convertKir;
                  axios.post('../api/vehicleKir/updateData',updateKir)
                      .then((response) => {
                          this.getDataView();
                          $('body').pgNotification({
                              style: 'flip',
                              message: 'Successfully saved!',
                              position: 'top-right',
                              timeout: 1000,
                              type: 'success'
                          }).show();
                      })
                      .catch((error) => {
                          $('body').pgNotification({
                              style: 'flip',
                              message: 'Try again!, incomplete data',
                              position: 'top-right',
                              timeout: 1000,
                              type: 'danger'
                          }).show();
                      })
              }else if(action == 'cancel'){
                  this.getDataView();
              }else{
                  this.disableEditKir = action;
              }
          },
          idCssListImg(){
              $('#dataListImg ul').css({
                  'margin': '0',
                  'text-align': 'left',
                  'max-width': 'none'
              });
              $('#dataListImg ul li').css({
                  'cursor':'pointer'
              });
              $('#dataListImg ul li').click(
                  setInterval(
                      function () {
                          $('#dataListImg .lightbox-overlay').css({
                              'z-index': '100000000000'
                          })
                      }
                      , 100
                  )
              );
          }
        }
    }
</script>

<style scoped>
    .vue-lightbox ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: block;
        max-width: none;
        text-align: left;
    }
</style>