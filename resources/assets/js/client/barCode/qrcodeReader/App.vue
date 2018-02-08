<template>
   <div>
       <VueQRCodeComponent text="Name : Arbianto Mauday;Divisi : Web Devoloper;Web Url : https://www.globalxtreme.net;" margin="20px"></VueQRCodeComponent>
       <hr>
       <QrcodeReader
               @decode="onDecode">
           <div class="decoded-content">{{ content }}</div>
       </QrcodeReader>
   </div>
</template>

<script>
    import { QrcodeReader } from 'vue-qrcode-reader'
    import VueQRCodeComponent from 'vue-qrcode-component'

    export default {
        components: { QrcodeReader, VueQRCodeComponent},
        data () {
            return {
                content: ''
            }
        },
        methods: {
            onDecode (content) {
                this.content = content
            }
        }
    }
</script>

<style scoped>
    .decoded-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        max-width: 100%;
        padding: 0px 20px;
        color: #fff;
        font-weight: bold;
        padding: 10px;
        background-color: rgba(0,0,0,.5);
    }
</style>