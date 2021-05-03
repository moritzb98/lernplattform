<template>
    <div>
        <h1>Dokumente</h1>

    <div class="card-body">

        <div v-for="fileUpload in fileUploads" :key="fileUpload.id">
            <p>ID: {{ fileUpload.id }} </p>
            <p>Name: {{ fileUpload.name }} </p>
            <p>Pfad: {{ fileUpload.path }} </p>
            <a download v-bind:href="'/upload/' + fileUpload.name">Download: {{ fileUpload.name }}</a>
            <hr>
        </div>
        <hr>
    </div>

    </div>


</template>

<script>

    export default{

        data(){
            return{
                fileUploads: [],
            }
        },
        mounted(){
            this.axios.get('http://127.0.0.1:8000/api/getFiles')
            .then(response=>{
                this.fileUploads = response.data
            });

        },
    }
</script>
