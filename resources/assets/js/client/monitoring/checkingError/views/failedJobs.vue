<template>
        <div class="container full-width container-fluid container-fixed-lg">
            <div class="row">
                <div class="col-md-12 m-b-20">
                    <router-link to="/" class="btn btn-default"><i class="pg-arrow_left"></i>Go Back</router-link>
                </div>

                <!-- START card -->
                <div class="card card-default bg-white">
                    <div class="card-header">
                        <div class="col-md-12">
                            <div class="card-title">Queue table of failed jobs</div>
                            <button class="btn btn-danger btn-cons m-l-5" @click="deleteAll()"><i class="fa fa-trash-o"></i> Delete All</button>
                            <button class="btn btn-complete btn-cons" @click="retryAll()"><i class="fa fa-refresh"></i> Tried All</button>
                            <div class="pull-right">
                                <div class="col-xs-12">
                                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-block">
                        <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                            <thead>
                            <tr>
                                <th>ID Queue</th>
                                <th>Connection</th>
                                <th>Queue</th>
                                <th>Payload</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="ee in resultData">
                                <td>{{ ee.id }}</td>
                                <td>{{ ee.connection }}</td>
                                <td>{{ ee.queue }}</td>
                                <td>{{ ee.payload }}</td>
                                <td>
                                    <button class="btn btn-danger btn-xs m-t-10" @click="deleteId(ee.id)">Delete</button>
                                    <button class="btn btn-complete btn-xs m-t-10" @click="retryId(ee.id,ee.queue)">Tried</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END card -->
            </div>
        </div>
</template>

<script>
    export default{
        data(){
            return{
                resultData: {}
            }
        },
        watch:{
            '$route' : ['getData']
        },
        created: function () {
        },
        mounted:function (){
            setInterval(this.getData, 100)
        },
        methods:{
            getData(){
                axios.get('../api/monitoring/checkingJobs/failedJobs/getData')
                .then((response)=>{
                    this.resultData = response.data;
                });
            },
            retryId(id,queue){
                axios.get(`../failedJobs/queues/retry?id=${id}&queue=${queue}`)
                .then((response)=>{
                    this.getData();
                    this.notifId('ID ' +id+ ' Successfully processed!');
                })
            },
            retryAll(){
                if(confirm("Are you sure ?")) {
                    axios.get('../failedJobs/queues/retry?id=')
                    .then((response)=>{
                        this.getData();
                        this.notifAll('All data successfully retried!');
                    })
                }
            },
            deleteId(id){
                axios.get(`../failedJobs/queues/delete?id=${id}`)
                .then((response)=>{
                    this.getData();
                    this.notifId('ID ' +id+ ' Successfully deleted!');
                })
            },
            deleteAll(){
                if(confirm("Are you sure ?")) {
                    axios.get('../failedJobs/queues/delete?id=')
                    .then((response) => {
                        this.getData();
                        this.notifAll('All data successfully deleted!');
                    })
                }
            },
            notifAll(mess){
                $('body').pgNotification({
                    style: 'flip',
                    message: mess,
                    position: 'top-right',
                    timeout: 2500,
                    type: 'success'
                }).show();
                this.$router.push('/')
            },
            notifId(mess){
                $('body').pgNotification({
                    style: 'flip',
                    message: mess,
                    position: 'top-right',
                    timeout: 2000,
                    type: 'success'
                }).show();
            }
        }

    }
</script>