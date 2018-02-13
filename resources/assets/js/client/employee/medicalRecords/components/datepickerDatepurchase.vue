<template>
      <input type="text" readonly class="form-control datepickerGet" placeholder="DD/MM/YYYY" required>
</template>
<script>
    export default{
        mounted(){
            $('.datepickerGet').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true
            });
        }
    }
</script>