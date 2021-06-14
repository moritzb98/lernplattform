<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    Lernmaterial
                </div>
            </div>
        </div>

        <div class="background-container">
            <div class="background">
                <span class="material-icons-outlined icon-für-oberen-Bereich">biotech</span>
                <div class="überschrift-oberer-Bereich" >
                    {{title}}
                </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <h5 v-if="noUploads" style="text-align: center; margin: 20px;" class="dashboard-headline">Keine Uploads</h5>
        <div class="container-data" v-for="(myFileUpload, index) in myFileUploads" :key="myFileUpload.id">
                <div :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white, '+ myFileUpload.data.color  + ')' }" :id="myFileUpload.data.id" class="container-uploads">
                    <div class="cursor" v-if="myFileUpload.data.id === editFileId">
                            <input class="input-feld" type="text" v-model="myFileUpload.data.displayname" autofocus>
                        </div>
                        <div v-else class="file-name-upload">{{ myFileUpload.data.displayname }}</div>
                    <div class="icon-container">
                        <div @click="showDropdown(index)" class="material-icons-outlined icon--middle">more_vert</div>
                    </div>
                </div>
                <transition name="fade">
                    <div class="container-dropdown" v-if="myFileUpload.data.showDropdown">
                        <div class="dropdown-item-container border-dropdown" v-if="myFileUpload.data.id === editFileId" @click="saveFile(myFileUpload.data)">
                            <div  class="material-icons-outlined icon--middle icon-dropdown">save</div>
                            <div class="dropdown-text">Speichern</div>
                        </div>

                        <div class="dropdown-item-container border-dropdown" v-else @click="editFile(myFileUpload.data.id)">
                            <div class="material-icons-outlined icon--middle icon-dropdown">edit</div>
                            <div class="dropdown-text">Bearbeiten</div>
                        </div>

                        <div class="dropdown-item-container border-dropdown" @click="deleteFile(myFileUpload.data)">
                            <div class="material-icons-outlined icon--middle icon-dropdown">delete</div>
                            <div class="dropdown-text">Löschen</div>
                        </div>

                        <div class="dropdown-item-container">
                            <div class="material-icons-outlined icon--middle icon-dropdown"><a class="a-text" download v-bind:href="'/upload/' + myFileUpload.data.name">file_download</a></div>
                            <a class="a-text" download v-bind:href="'/upload/' + myFileUpload.data.name"><div class="dropdown-text">Herunterladen</div></a>
                        </div>

                    </div>
                </transition>
        </div>

        <br><br><br><br><br>

        <!-- Nav -->
        <Nav />

    </div>


</template>

<script>
import {MDCTabBar} from '@material/tab-bar';

    export default{

        data(){
            return{
                fileUploads: [],
                myFileUploads: [],
                title: "Meine Uploads",
                editFileId: null,
                noUploads: true,

            }
        },
        mounted(){
            this.axios.get('/api/getFiles')
            .then(response=>{
                this.fileUploads = response.data.data;
            });

            this.axios.get('/api/getMyFiles')
            .then(response=>{
                this.myFileUploads = response.data.data;
                for(var i = 0; i < this.myFileUploads.length; i++){
                    this.myFileUploads[i].data.showDropdown = false;
                    this.myFileUploads[i].data.color = response.data.data[i].data.category_id.color;
                }
                if(this.myFileUploads.length > 0){
                    this.noUploads = false;
                }
            });


        },
        methods:{
            editFile(id){
                this.editFileId = id;
            },
            saveFile(file){
                this.axios.post('/api/files/update', file)
                    .then(response => (
                        this.editFileId = null
                    ))
            },
            deleteFile(file){
                this.axios.post('/api/files/delete/', file)
                    .then(response => {
                        for(var i=0; i<this.myFileUploads.length; i++){
                            if(this.myFileUploads[i].data.id===file.id){
                                this.myFileUploads.splice(i, 1);
                            }
                        }
                    })
            },
            showDropdown(index){
                this.myFileUploads[index].data.showDropdown = !this.myFileUploads[index].data.showDropdown;
                this.$forceUpdate();
            },
        }
    }


</script>

<style scoped>
    .content {
        display: none;
    }

    .file-name-upload-link{
        max-width: 72%;
    }

    .content--active {
        display: block;
    }

    .mdc-tab-scroller-overflow{
        overflow: visible;
    }

    .tab-bar{
        display: flex;
    }

    .tab-button{
        background: linear-gradient(to bottom right,white, #F1F1F1);
        height: 50px;
        width: 100%;
        padding:0px;
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
        border-radius: 0px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .tab-active{
        box-shadow: inset 6px 6px 10px 0 rgba(0, 0, 0, 0.2),
            inset -6px -6px 10px 0 white,
            12px 12px 24px 0 rgba(0, 0, 0, 0.2),
            -12px -12px 24px 0 rgba(255, 255, 255, 0.5);
    }

    .button-text--mittig{
        margin: auto;
    }

    .container-uploads{
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        height: 40px;
        border-radius: 28px;
        border: double 2px transparent;
        background-image: radial-gradient(white, white), radial-gradient(circle at top left,white,#ED553B);
        background-origin: border-box;
        background-clip: content-box, border-box;
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
    }

    .file-name-upload{
        padding-left: 2em;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .upload-showmore-icon{
        padding-right: 20px;
    }

    .icon-container {
        margin-right: 10px;
    }

    .icon--middle {
        vertical-align: middle;
    }

    .input-feld{
        margin-left: 23px;
        padding-left: 5px;
        border: 0.3px solid rgb(170, 170, 170);
        border-radius: 11px;
        width: 100%;
    }

     .input-feld:focus{
         border-radius: 11px;
         border: 0.3px solid #015FCC;
         outline: none;
     }

     .cursor {
	    position: relative;
    }

    .cursor	i {
        position: absolute;
        width: 1px;
        height: 80%;
        background-color: gray;
        left: 5px;
        top: 10%;
        animation-name: blink;
        animation-duration: 800ms;
        animation-iteration-count: infinite;
        opacity: 1;
    }

    .cursor input:focus + i {
        display: none;
    }

    @keyframes blink {
        from { opacity: 1; }
        to { opacity: 0; }
    }

    .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
    }

    .container-dropdown{
        background-color: white;
        border-radius:3px;
        /*border: solid 2px gray;*/
        display: flex;
        justify-content: flex-end;
        flex-direction: column;
        width: 45%;
        margin-right: 0px;
        margin-left: auto;
        background-origin: border-box;
        background-clip: content-box, border-box;
        box-shadow: -5px -5px 13px #fff, 5px 5px 13px #0e0e0e40;
        position: absolute;
        right: 10px;
        top: 35px;
        z-index: 2;
    }

    .dropdown-item-container{
        display: flex;
        flex-wrap: nowrap;
        margin-bottom: 1px;
        padding-bottom: 1px;
        margin-top: 1px;
        padding-top: 1px;
    }

    .border-dropdown{
        /*border-bottom: 2px solid grey;*/

    }

    .dropdown-text{
        margin-left: 10px;
    }

    .icon-dropdown{
        margin-left: 7px;
    }

    .container-data{
        position: relative;
    }



</style>
