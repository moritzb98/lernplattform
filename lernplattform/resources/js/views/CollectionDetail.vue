<template>
    <div>
        <!-- Header [Search] -->
        <div class="header_wrapper">
            <div class="header header--search">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    Details
                </div>
            </div>
        </div>

        <div class="background-container">
            <div :style="{ backgroundColor: collection.colorBackground }"  class="background">
                <span :style="{ color: collection.colorIcon }" class="material-icons-outlined icon-für-oberen-Bereich">biotech</span>
                <div :style="{ color: collection.data.category_id.color }" class="überschrift-oberer-Bereich">{{collection.data.name}}</div>
            </div>

            <div :style="{ backgroundColor: collection.colorBackground }"  class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>


            <div :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white, '+ collection.data.category_id.color  + ')' }" class="mdc-card mdc-card-lernmaterial">
                <div class="card-lernmaterial-spacing card-lernmaterial-spacing-zweispaltig">
                    <div :style="{ backgroundColor: collection.data.category_id.color }" class="card-lernmaterial-icon-container card-lernmaterial-icon-container-weiter-rechts">
                        <span class="material-icons material-icons-lernmaterial">school</span>
                    </div>
                    <div class="card-lernmaterial-middle-column-container card-lernmaterial-middle-column-container-zweispaltig">
                        <div class="mdc-chip-container">
                            <div :style="{ backgroundColor: collection.data.category_id.color }" class="mdc-chip mdc-chip--red mdc-chip-lernmaterial" role="row">
                                <span class="mdc-chip__text"> {{collection.data.category_id.name}}</span>
                            </div>
                        </div>
                        <div class="card-lernmaterial-headline card-lernmaterial-headline-collection-detail">{{collection.data.name}}</div>
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

            <!-- Nav -->
            <Nav />
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
                },

            }
        },
        mounted(){
            this.collection.id = this.$route.params.id;
            this.data.collection_id = this.collection.id;
            axios.get('/api/collection/show/'+this.$route.params.id)
            .then(response=>{
                this.collection = response.data.data[0];
                this.collection.colorBackground = this.hexToRgbA(response.data.data[0].data.category_id.color, 0.4);
                this.collection.colorIcon = this.hexToRgbA(response.data.data[0].data.category_id.color, 0.5);
            });
            axios.post('/api/files/showInCollection', this.collection)
            .then(response=>{
                this.filesToCollection = response.data.data;
            });
            axios.get('/api/getMyFiles')
            .then(response=>{
                this.allFiles = response.data.data;
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
            },
            hexToRgbA(hex, opacity){
                var c;
                if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
                    c= hex.substring(1).split('');
                    if(c.length== 3){
                        c= [c[0], c[0], c[1], c[1], c[2], c[2]];
                    }
                    c= '0x'+c.join('');
                    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+','+opacity+')';
                }
                throw new Error('Bad Hex');
            },
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
