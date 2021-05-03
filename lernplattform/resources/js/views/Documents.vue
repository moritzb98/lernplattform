<template>
    <div>
        <h1>Dokumente</h1>

    <div class="card-body">
        <table class="table table-hover table-bordered" id="app">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Pfad</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="fileUpload in fileUploads" :key="fileUpload.id">
                                <td> {{ fileUpload.id }} </td>
                                <td> {{ fileUpload.name }} </td>
                                <td> {{ fileUpload.path }} </td>

                            </tr>
                            </tbody>
                        </table>
    </div>

    </div>


</template>

<script>

    export default{

        data(){
            return{
                fileUploads: []
            }
        },


        created(){

        axios.get('./spa/upload').then(response => this.fileUploads = response.data);
        }

    }
</script>
