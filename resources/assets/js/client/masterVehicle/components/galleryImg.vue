<template>
    <div class="container full-width container-fluid container-fixed-lg">
        <div class="row">
            <div class="col-md-12 m-b-20">
                <router-link class="btn btn-default btn-cons text-primary" :to="urlGoBack"><i class="pg-arrow_left"></i>Go Back</router-link>
                <button class="btn btn-danger btn-cons" @click="modalAddImg"><i class="fa fa-plus"></i> Add Image</button>
            </div>

            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title">Gallery Images</div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <lightbox :resetstyles="false" :images="images" :caption="true" :nav="true" id="unicListImg"></lightbox>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Star Modal Add Images -->
        <div class="modal fade stick-up" id="modalAddImages" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>Add New <span class="semi-bold">Image</span></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Title Image</label>
                                        <input type="text" v-model="titleImg" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <input type="file" id="getImages" @change="previewImage" accept="image/*" style="display: none">
                                        <label>Select Image <span style="font-size: 16px;cursor:pointer" @click="actionGetImg" class="fa fa-camera text-danger"></span></label>
                                        <img :src="imageData" id="sourcesPerson" alt="" style="width:100%;height:100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12 m-t-10 sm-m-t-10">
                                <button type="button" class="btn btn-success m-t-5" @click="addImg()">Add Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Add Images -->
    </div>
</template>

<script>
    export default{
        data(){
            return{
                images: [],
                urlGoBack : '/viewDetail/'+this.$route.params.id+'/'+this.$route.params.plateNumber,
                titleImg : '',
                fileImg : '',
                imageData: ''
            }
        },
        created:function (){
            this.listImg();
        },
        watch:{
            '$route': 'listImg'
        },
        methods:{
            listImg(){
                this.urlGoBack = '/viewDetail/'+this.$route.params.id+'/'+this.$route.params.plateNumber;
                axios.get(`../api/vehicleImg/getData?id=${this.$route.params.id}`)
                .then((response) => {
                    this.images     = response.data.listImg
                    this.titleImg   = ''; // reset title image
                    this.imageData  = ''; // reset input image
                    this.cssListImg(); // get css
                })
            },
            actionGetImg(){
                $('#getImages').trigger('click');
            },
            modalAddImg(){
                $('#modalAddImages').modal('show')
            },
            previewImage: function(event) {
                // Reference to the DOM input element
                var input = event.target;
                // Ensure that you have a file before attempting to read it
                if (input.files && input.files[0]) {
                    // create a new FileReader to read this image and convert to base64 format
                    var reader = new FileReader();
                    // Define a callback function to run, when FileReader finishes its job
                    reader.onload = (e) => {
                        // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                        // Read image as base64 and set to imageData
                        this.imageData = e.target.result;
                    }
                    // Start the reader job - read file as a data url (base64 format)
                    reader.readAsDataURL(input.files[0]);
                }
            },
            addImg(){
                var self = this
                var dataInput = {
                    'vehicleId' : self.$route.params.id,
                    'file'      : self.imageData,
                    'title'     : self.titleImg
                }
                if(self.imageData !== '' && self.titleImg !== ''){
                    axios.post('../api/vehicleImg/add',dataInput)
                    .then((response) => {
                        this.listImg()
                        $('#modalAddImages').modal('hide')
                    })
                }
            },
            cssListImg(){ // css get data
                $('#unicListImg ul').css({
                    'margin': '0',
                    'text-align': 'left',
                    'max-width': 'none'
                });
                $('#unicListImg ul li').css({
                    'cursor':'pointer'
                });
                $('#unicListImg ul li').click(
                    setInterval(
                        function () {
                            $('#unicListImg .lightbox-overlay').css({
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