<template>
    <input type="text" readonly class="form-control yearpickerGet" placeholder="YYYY" required>
</template>
<script>
    export default{
        mounted(){
            $('.yearpickerGet').datepicker({
                format: 'yyyy',
                autoclose: true,
                startView: 2,
                minViewMode: 2
            });
        }
    }
</script>