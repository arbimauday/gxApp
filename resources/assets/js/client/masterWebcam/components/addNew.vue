<template>
  <div>

      <!-- MODAL ADD NEW  -->
      <div class="modal fade stick-up" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header clearfix text-left">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                      </button>
                      <h5>Add New <span class="semi-bold">Barcode</span></h5>
                      <p>We need your Information data for convert to Barcode</p>
                  </div>
                  <div class="modal-body">
                      <div class="form-group-attached">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group form-group-default">
                                      <label>Full Name</label>
                                      <input type="text" v-model="fullName" class="form-control">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                      <label>Email</label>
                                      <input type="email" v-model="email" class="form-control">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                      <label>Company Name</label>
                                      <input type="text" v-model="companyName" class="form-control">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                      <label>QR Barcode</label>
                                      <VueQRCodeComponent :size="200" :text="'Name : ' + fullName + ', Email : ' + email + ', Company : ' + companyName"></VueQRCodeComponent>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                      <label>Take Picture  <span class="pull-right"><a href="#/" style="font-size: 16px;" class="fa fa-camera text-danger" @click="activeCamera"></a></span></label>
                                      <img :src="photo" alt="" style="width:100%;height:100%">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row text-center">
                          <div class="col-md-12 m-t-10 sm-m-t-10">
                              <button type="button" class="btn btn-success m-t-5" @click="uploadImg">Add Now</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- END MODAL ADD NEW  -->

      <!-- Modal -->
      <div class="modal fade fill-in show" id="modalFillIn" tabindex="-1" role="dialog" aria-hidden="true">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="pg-close"></i>
          </button>
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-lg-12 text-center">
                              <vue-webcam ref='webcam' v-if="openMethodWebcam == 1" :width="400" :height="400"></vue-webcam>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-12 text-center p-b-5">
                              <button type="button" @click="take_photo"  class="btn btn-primary btn-lg btn-large fs-15">Take Picture</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Modal -->

  </div>
</template>

<script>
    import VueQRCodeComponent from 'vue-qrcode-component'
    import VueWebcam from 'vue-webcam'

    export default {
        components: {VueQRCodeComponent, VueWebcam},
        data(){
            return {
                fullName: '',
                email : '',
                companyName : '',
                takeImage: '',
                photo: null,
                openMethodWebcam: 0
            }
        },
        methods:{
            uploadImg(){
              var self = this
              var dataImput = {
                  'fullName' : self.fullName,
                  'email' : self.email,
                  'company' : self.companyName,
                  'file' : self.photo
              }
              axios.post('../api/masterWebcam/addData', dataImput)
              .then((response) => {
                  console.log(response)
                  self.fullName = ''
                  self.email = ''
                  self.companyName = ''
                  self.photo = ''
                  $('#myModal').modal('hide')
              })
            },
            activeCamera(){
                $('#modalFillIn').modal('show')
                this.openMethodWebcam = 1;
            },
            take_photo(){
                $('#modalFillIn').modal('hide');
                this.photo = this.$refs.webcam.getPhoto();
                console.log(this.$refs.webcam.getCanvas())
                this.openMethodWebcam = 0;
            }
        }
    }
</script>