<template>
    <div class="inner-content full-height" :class="form_report">
        <!-- START COMPOSE EMAIL -->
        <div class="email-composer container-fluid">
            <div class="row">
                <div class="col-md-12 no-padding">
                    <div class="email-body-wrapper">
                        <textarea :id="'summernote'" style="height:350px" v-model="addNot.notes"></textarea>
                    </div>
                </div>
            </div>
            <div class="row p-b-20">
                <div class="col-md-12 text-center">
                    <button class="btn btn-white btn-cons" @click="cancelSend()">Cancel</button>
                    <button class="btn btn-complete btn-cons m-l-10" @click="sendReport()">Send</button>
                </div>
            </div>
        </div>
        <!-- END COMPOSE EMAIL -->
    </div>
</template>

<script>
    export default{
        props:['form_report'],
        data(){
            return{
                addNot:{
                    'notes':''
                },
                errors:{},
            }
        },
        methods:{
            sendReport(){
                var self = this;
                this.addNot = {
                    'notes' : $('#summernote').code()
                }
                var dataInput = self.addNot

                axios.post('../../api/report/send',dataInput)
                .then((response) => {
                    if(response.data == 1){
                        $('body').pgNotification({
                            style: 'bar',
                            message: 'Successfully saved!',
                            position: 'top',
                            timeout: 1000,
                            type: 'success'
                        }).show();
                        $('#summernote').code(''); // reset data input
                        this.$bus.$emit('getdataReport', 0);
                    }else{
                        $('body').pgNotification({ // notification false input
                            style: 'flip bar',
                            message: 'Something Wrong, Please Try again!',
                            position: 'top-right',
                            timeout: 2500,
                            type: 'danger'
                        }).show();
                    }
                })
                .catch((error) => this.errors = error.response.data)
            },
            cancelSend(){
                $('#summernote').code(''); // reset data input
                this.$bus.$emit('getdataReport', 0);
            }
        }
    }
</script>