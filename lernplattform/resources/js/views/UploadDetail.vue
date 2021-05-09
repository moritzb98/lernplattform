<template>
    <div>
        <h1>Hallo</h1>
        <p>{{file}}</p>
        <p>{{file.displayname}}</p>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                file:{}

            }
        },
        mounted(){
            axios.get('/api/upload/'+this.$route.params.id)
            .then(response=>{
                this.file = response.data;
            });
            console.log(this.file);
        },
        methods: {

        }
    }
</script>
