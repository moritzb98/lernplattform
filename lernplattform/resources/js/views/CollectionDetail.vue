<template>
    <div>
            <div class="mdc-card mdc-card-lernmaterial">
                <div class="card-lernmaterial-spacing card-lernmaterial-spacing-zweispaltig">
                    <div class="card-lernmaterial-icon-container card-lernmaterial-icon-container-weiter-rechts">
                        <span class="material-icons material-icons-lernmaterial">school</span>
                    </div>
                    <div class="card-lernmaterial-middle-column-container card-lernmaterial-middle-column-container-zweispaltig">
                        <div class="mdc-chip-container">
                            <div class="mdc-chip mdc-chip--red mdc-chip-lernmaterial" role="row">
                                <span class="mdc-chip__text">Thema</span>
                            </div>
                        </div>
                        <div class="card-lernmaterial-headline card-lernmaterial-headline-collection-detail">{{collection.name}}</div>
                    </div>
                </div>
                <div class="strich-container">
                    <hr>
                </div>
                <div class="unterer-Teil-Card-Detail-Sammlung">
                    <div class="zugeordnete-Sammlungen-Container">
                        <div class="zugeordnete-Sammlungen-Überschrift">Zugeordnete Datein:</div>
                        <div class="einzelne-zugeordnete-Sammlungen-Container" v-for="file in filesToCollection" :key="file.id">
                            <div>{{file.data.file_id.displayname}}</div>
                        </div>
                    </div>
                    <div class="strich-container">
                        <hr>
                    </div>
                    <div class="zugeordnete-Sammlungen-Container">
                        <div class="zugeordnete-Sammlungen-Überschrift">Dateien zuordnen</div>
                        <div class="text-kursiv-dünn">Wähle Datein, die du der Sammlung {{collection.name}} zuordnen möchtest:</div>
                        <div class="nicht-zugeordnete-Container" v-for="file in allFiles" :key="file.id">
                            <div>{{file.data.displayname}}</div>
                            <div @click="assignFile(file.data)"><span class="material-icons-outlined">add</span></div>
                        </div>
                    </div>
                </div>

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
                    this.getData();
                });
            },
            getData(){
                axios.post('/api/files/showInCollection', this.collection)
                .then(response=>{
                    this.filesToCollection = response.data.data;
                    console.log(response.data)
                });
            }
        }
    }
</script>

<style scoped>

    .card-lernmaterial-headline-collection-detail{
        margin-top: 10px;
        font-size: 1.5em;
        overflow: visible;
    }

    .nicht-zugeordnete-Container{
        margin-top: 5px;
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
    }

    .einzelne-zugeordnete-Sammlungen-Container{
        margin-bottom: 1em;
    }

    .unterer-Teil-Card-Detail-Sammlung{
        margin-bottom: 1em;
    }

    .text-kursiv-dünn{
        font-style: italic;
        font-weight: lighter;
    }

    .card-lernmaterial-icon-container-weiter-rechts{
        margin-left: 17px;
    }

    .card-lernmaterial-spacing-zweispaltig{
        justify-content: normal;
        padding: 1em 1em 0;
    }

    .card-lernmaterial-middle-column-container-zweispaltig{
        margin-left: 10px;
    }

</style>
