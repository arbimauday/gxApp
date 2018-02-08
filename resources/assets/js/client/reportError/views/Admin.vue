<template>
    <div>

        <nav class="secondary-sidebar">
            <p class="menu-title">REPORT ERROR</p>
            <ul class="main-menu">
                <li @click="getReport(0)" :class="{ active : active_el == 0 }">
                    <a href="#">
                        <span class="title"><i class="pg-inbox"></i> New</span>
                        <span class="badge pull-right">{{ countReport.new }}</span>
                    </a>
                </li>
                <li @click="getReport(1)" :class="{ active : active_el == 1 }">
                    <a href="#">
                        <span class="title"><i class="pg-layouts4"></i> On Progress</span>
                        <span class="badge pull-right">{{ countReport.onpro }}</span>
                    </a>
                </li>
                <li @click="getReport(2)" :class="{ active : active_el == 2 }">
                    <a href="#">
                        <span class="title"><i class="fa fa-check-square-o"></i> Clear</span>
                        <span class="badge pull-right">{{ countReport.clear }}</span>
                    </a>
                </li>
            </ul>
        </nav>


        <!-- Column Search -->
        <div class="inner-content full-height">
            <div class="input-group transparent">
                      <span class="input-group-addon">
                          <i class="pg-search"> &nbsp; &nbsp; Search</i>
                      </span>
                <input type="text" placeholder="Type text anywhere to search" class="form-control input-lg" v-model="searchQuery">
            </div>
        </div>
        <!--/ Column Search -->

        <div class="inner-content full-height padding-10">
            <div class="timeline-block m-0 m-b-15" v-for="lists in temp" track-by="$index/id_report">
                <!-- Data Report -->
                <div class="timeline-content bounce-in m-l-0 p-b-10">
                    <div class="card social-card share full-width">
                        <div class="circle" data-toggle="tooltip" title="Label" data-container="body"></div>
                        <div class="card-header clearfix">
                            <div class="user-pic">
                                <img alt="Profile Image" width="33" height="33"
                                     :src="'../../temp/assets/img/profiles/4x.jpg'">
                            </div>
                            <!-- Name User-->
                            <h5>{{ lists.full_name }}</h5>
                            <!-- Date Send -->
                            <h6>
                                <i class="pg-calender"></i>{{ lists.created_at }}
                    </h6>
                        </div>
                        <div class="card-description"> <!-- isi notes -->
                            <!--{{(lists.notes)}}-->
                            <p v-html="lists.notes"></p>
                        </div>
                        <div class="card-footer clearfix p-b-0 p-t-0 bg-master-lightest">
                            <ul class="reactions pull-left" style="opacity:1;">
                                <li>
                                    <div class="radio radio-success">
                                        <input type="radio" value="2" :name="'status' + lists.id_report"
                                               :id="'clear' + lists.id_report" @click="updateStatus(lists.id_report, '2')" :checked="isChecked == 2">
                                        <label :for="'clear' + lists.id_report">Clear</label>
                                    </div>
                                </li>
                                <li v-if="lists.id_status <= 1">
                                    <div class="radio radio-warning">
                                        <input type="radio" value="1" :name="'status' + lists.id_report"
                                               :id="'opg' + lists.id_report" @click="updateStatus(lists.id_report, '1')" :checked="isChecked == 1">
                                        <label :for="'opg' + lists.id_report">On Progress</label>
                                    </div>
                                </li>
                                <!--<li><i class="pg-trash hint-text"></i> Del</li>  Delete Data -->
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!--/ Data Report -->
            </div>
        </div>


        <!-- Modal View Images -->
        <div class="modal fade fill-in active is-active" id="modalFillIn" tabindex="-1" role="dialog" aria-hidden="true">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="pg-close"></i>
            </button>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-left p-b-5"><span class="semi-bold">News letter</span> signup</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-9 ">
                                <input type="text" placeholder="Your email address here" class="form-control input-lg" id="icon-filter" name="icon-filter">
                            </div>
                            <div class="col-lg-3 no-padding sm-m-t-10 sm-text-center">
                                <button type="button" class="btn btn-primary btn-lg btn-large fs-15">Sign up</button>
                            </div>
                        </div>
                        <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--/ Modal View Images -->

    </div>
</template>

<script>
    export default{
        data(){
            return {
                reportNew: {}, // data report new
                //errors: '', // data process script error
                idStatus: '0', // id status filter data
                isChecked : 0, // auto add checked in radio button
                active_el : {}, // click add class active in button navigation status
                countReport : {
                    new : '',
                    onpro : '',
                    clear : ''
                },
                searchQuery : '',
                temp : ''
            }
        },
        watch:{
            searchQuery(){
                if(this.searchQuery.length > 0){
                    this.temp =  this.reportNew.filter((item) => {
                        return Object.keys(item).some((key)=>{
                            let string = String(item[key])
                            return string.toLocaleLowerCase().indexOf(this.searchQuery.toLocaleLowerCase())>-1
                        })
                    });
                }else{
                    this.temp = this.reportNew
                }
            }
        },
        created: function () { // auto run methods like '$(document).function' in javascript
            this.getReport(0)
        },
        methods: {
            getReport(idStatus){
                var self = this;
                $('input[type="radio"]').prop('checked', false); // reset checkradio
                axios.get(`../../api/report/admin/getdata?id_status=${idStatus}`)
                    .then((response) => {
                        self.reportNew = self.temp = response.data.reportNew; // data report
                        self.countReport.new = response.data.new; // count report new
                        self.countReport.onpro = response.data.onpro; // count report onpro
                        self.countReport.clear = response.data.clear; // count report clear
                        self.active_el = idStatus; // add class active
                        self.isChecked = idStatus; // add checked radio button
                    })

            },
            updateStatus(id_report, idSts){
                var self = this;
                axios.patch(`../../api/report/admin/update/${id_report}/${idSts}`).then((response) => {
                    self.getReport(self.active_el)
                    $('body').pgNotification({
                        style: 'bar',
                        message: 'Successfully saved!',
                        position: 'top',
                        timeout: 1000,
                        type: 'info'
                    }).show();
                })
                .catch((error) => this.errors = error.response.data)
            }
        }

    }
</script>