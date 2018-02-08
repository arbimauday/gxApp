<template>
    <div class="container full-width container-fluid container-fixed-lg">
        <div class="row">
            <div class="col-md-12 m-b-20">
                <router-link class="btn btn-primary" to="/addVehicle" >Add New</router-link>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <input type="text" v-model="searchQuery" class="form-control pull-left" placeholder="Search..">
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-lg-auto" v-for="vm in resultSearch">
                <div class="card card-default">
                    <router-link :to="'/viewDetail/' + vm.id + '/'+ vm.plateNumber" class="card-header p-t-0 p-b-0 p-l-15 btn-default" style="border-radius:1%;border-top:0px;box-shadow:0 10px 20px rgba(0, 0, 0, 0.2);">
                        <div class="card-title">
                                  <h6 class="bold m-b-0"> {{ vm.plateNumber }} </h6>
                                  <p class="hint-text m-b-0">{{ vm.modelType }}</p>
                        </div>
                    </router-link>
                    <div class="card-block padding-0">
                        <div class="form-group-attached">
                            <div class="form-group-default">
                                <label>Division</label>
                                <input class="form-control" readonly v-model="vm.division">
                            </div>
                            <div class="form-group-default">
                                <label>Color</label>
                                <input class="form-control" readonly v-model="vm.color">
                            </div>
                            <div class="form-group-default">
                                <label>Fuel</label>
                                <input class="form-control" readonly v-model="vm.fuel">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                listData:{},
                searchQuery : '',
                resultSearch : ''
            }
        },
        created(){
            this.getData();
        },
        watch:{
            '$route': ['getData'],
            searchQuery(){ // search data
                if(this.searchQuery.length > 0){
                    this.resultSearch =  this.listData.filter((item) => {
                        return Object.keys(item).some((key)=>{
                            let string = String(item[key])
                            return string.toLocaleLowerCase().indexOf(this.searchQuery.toLocaleLowerCase())>-1
                        })
                    });
                }else{
                    this.resultSearch = this.listData
                }
            }
        },
        methods:{
            getData(){
                axios.get('../api/masterVehicle/getListVehicle?vehicleTypeId=1')
                .then((response) => {
                    this.listData = this.resultSearch = response.data.dataVehicle
                })
            }
        }
    }

</script>


<style scoped lang="scss">
    .vue-lightbox ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: block;
        max-width: none;
        text-align: left;

        li {
            display: inline-block;
            padding: 5px;
            background: ghostwhite;
            margin: 10px;

            img {
                display: block;
                width: 200px;
            }
        }
    }
</style>