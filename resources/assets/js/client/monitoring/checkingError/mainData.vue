<template>
    <div class="container full-width container-fluid container-fixed-lg">
        <div class="row">
            <div class="col-md-12 m-b-20">
                <router-link to="/failedJobs" class="btn btn-primary">Checking Failed Jobs</router-link>
            </div>

            <!-- START card -->
            <div class="card card-default bg-white">
                <div class="card-header">
                    <div class="col-md-12">
                        <div class="card-title">Queue table of jobs</div>
                        <button class="btn btn-danger btn-cons m-l-5" @click="deleteAll()"><i class="fa fa-trash-o"></i> Delete All</button>
                        <!--<button class="btn btn-complete btn-cons"><i class="fa fa-refresh"></i> Tried All</button>-->
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
                            <th>Queue</th>
                            <th>Payload</th>
                            <th>Attempts</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="ee in resultData">
                            <td>{{ ee.id }}</td>
                            <td>{{ ee.queue }}</td>
                            <td>{{ ee.payload }}</td>
                            <td>{{ ee.attempts }}</td>
                            <td>
                                <button class="btn btn-danger btn-xs m-t-10" @click="deleteId(ee.id)">Delete</button>
                                <!--<button class="btn btn-complete btn-xs m-t-10">Tried</button>-->
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
                axios.get('../api/monitoring/checkingJobs/jobs/getData')
                .then((response)=>{
                    this.resultData = response.data;
                })
            },
            retryId(id,queue){
                axios.get(`../jobs/queues/retry?id=${id}&queue=${queue}`)
                .then((response)=>{
                    this.getData();
                })
            },
            deleteId(id){
                axios.get(`../jobs/queues/delete?id=${id}`)
                .then((response) => {
                    this.getData();
                    this.notif('ID ' +id+ ' Successfully deleted!');
                })
            },
            deleteAll(){
                if(confirm("Are you sure ?")){
                    axios.get('../jobs/queues/delete')
                    .then((respond)=>{
                        this.getData();
                        this.notif('Successfully Deleted!');
                    })
                }
            },
            notif(mess){
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