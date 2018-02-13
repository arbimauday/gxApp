<template>

</template>

<script>
    export default{
        created: function () {
        },
        mounted:function (){
            setInterval(this.callDatepicker, 100)
        },
        methods:{
            callDatepicker(){
                $('.datepickerGet').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
            }
        }
    }
</script>