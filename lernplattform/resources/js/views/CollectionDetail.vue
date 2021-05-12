<template>
    <div>
        <h1>Hallo</h1>
        <div>{{collection}}</div>
        <div>{{collection.name}}</div>
        <hr>
        <div>Schon zugeordnete:</div>
        <div class="mdc-card-container--45" v-for="file in filesToCollection" :key="file.id">
            <div>{{file.data.file_id.displayname}}</div>
        </div>
        <hr>
        <div class="mdc-card-container--45" v-for="file in allFiles" :key="file.id">
            <div>{{file.data.displayname}}</div>
            <div @click="assignFile(file.data.id)">plus</div>
            <br>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                collection:{},
                filesToCollection:[],
                allFiles:[],
                data: {
                    file_id: null,
                    collection_id: null,
                }
            }
        },
        mounted(){
            this.collection.id = this.$route.params.id;
            this.data.collection_id = this.collection.id;
            axios.get('/api/collection/show/'+this.$route.params.id)
            .then(response=>{
                this.collection = response.data;
                console.log(response.data)
            });
            axios.post('/api/files/showInCollection', this.collection)
            .then(response=>{
                this.filesToCollection = response.data.data;
                console.log(response.data)
            });
            axios.get('/api/getMyFiles')
            .then(response=>{
                this.allFiles = response.data.data;
                console.log(response.data)
            });
        },
        methods: {
            assignFile(fileid){
                this.data.file_id = fileid;
                axios.post('/api/collection/addFile', this.data)
                .then(response=>{
                    Vue.$toast.success('Datei erfolgreich zugeordnet', {});
                });
            }
        }
    }
</script>
