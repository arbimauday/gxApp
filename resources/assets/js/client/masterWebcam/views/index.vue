<template>
 <div>
    <div class="container full-width container-fluid container-fixed-lg">
        <div class="row">
            <div class="col-md-12 m-b-20">
                <button class="btn btn-default">Take Picture</button>
                <button class="btn btn-danger" @click="openAddNewModal">Add New</button>
                <button class="btn btn-primary">Screen Barcode</button>
            </div>

            <!-- START card VEHICLE INFORMATION -->
            <div class="col-lg-3 col-sm-6 col-lg-auto" v-for="vm in dataBarcode">
                <div class="card card-default">
                    <a class="card-header p-t-5 p-b-0 p-l-15" href="#/">
                        <div class="card-title"><h6 class="bold"> {{ vm.fullName }} </h6></div>
                    </a>
                    <div class="card-block padding-0">
                      <div class="form-group-attached">
                          <div class="form-group-default">
                              <label>Email</label>
                              <input type="text" readonly v-model="vm.email" class="form-control">
                          </div>
                          <div class="form-group-default">
                              <label>Comapany</label>
                              <input type="text" readonly v-model="vm.company" class="form-control">
                          </div>
                      </div>
                    </div>
                </div>
            </div>
            <!-- END card VEHICLE INFORMATION -->
        </div>
    </div>

    <addNew ></addNew>
 </div>
</template>

<script>

    let addNew = require('../components/addNew.vue');

    export default{
        components: {addNew},
        data(){
            return{
                addNewModalActive : '',
                dataBarcode : {}
            }
        },
        created(){
          this.listData()
        },
        methods:{
            openAddNewModal(){
                $('#myModal').modal('show')
            },
            activeCamera(){
                $('#modalFillIn').modal('show')
            },
            listData(){
                axios.get('../api/masterWebcam/getData')
                .then((response) => {
                    this.dataBarcode = response.data;
                })
            }
        }
    }
</script>