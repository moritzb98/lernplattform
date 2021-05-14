<template>
    <div>
        <!-- Header -->
        <div class="header_wrapper">
            <div class="header">
                <div class="header_title">
                    {{title}}
                </div>
                <router-link to="/spa/Suche">
                    <span class="material-icons header_search">search</span>
                </router-link>
            </div>
        </div>

        <!-- Content  -->
        <div>
            <div class="mdc-chip mdc-chip-filter" role="row">
                <div class="mdc-chip__ripple"></div>
                    <span class="material-icons-outlined">filter_alt</span>
                    <span role="gridcell">
                        <span role="button" tabindex="0" class="mdc-chip__primary-action">
                            <span class="mdc-chip__text">Alles</span>
                        </span>
                    </span>
            </div>
            <div class="mdc-chip mdc-chip-filter" role="row">
                <div class="mdc-chip__ripple"></div>
                    <span class="material-icons-outlined">sort</span>
                    <span role="gridcell">
                        <span role="button" tabindex="0" class="mdc-chip__primary-action">
                            <span class="mdc-chip__text">Sortieren</span>
                        </span>
                    </span>
            </div>
        </div>
        <div v-for="myFileUpload in myFileUploads" :key="myFileUpload.id">
            <router-link :to='"/spa/documents/"+myFileUpload.data.id'>
                <div class="container-uploads">
                    <div class="file-name-upload">{{ myFileUpload.data.displayname }}</div>
                    <div class="icon-container">
                        <div class="material-icons-outlined icon--middle">delete</div>
                        <div  class="material-icons-outlined icon--middle"><a download v-bind:href="'/upload/' + myFileUpload.data.name">file_download</a></div>
                    </div>
                </div>
            </router-link>
        </div>



        <!-- <div class="tab-bar">

            <button @click="toggleTab('tab1', 'content1')" id="tab1" class="mdc-button tab-button">
                <span class="button-text button-text--mittig">Alle Dateien</span>
                </button>
            <button @click="toggleTab('tab2', 'content2')" id="tab2" class="mdc-button tab-button">
                <span class="button-text button-text--mittig">Meine Dateien</span>
            </button>
        </div>
        <div id="content1" class="content content--active">
            <div v-for="fileUpload in fileUploads" :key="fileUpload.id">
                <p>ID: {{ fileUpload.data.id }} </p>
                <p>Name: {{ fileUpload.data.name }} </p>
                <p>Pfad: {{ fileUpload.data.path }} </p>
                <p>Erstellt von: {{ fileUpload.data.user_id.name }}</p>
                <a download v-bind:href="'/upload/' + fileUpload.data.name">Download: {{ fileUpload.data.name }}</a>
                <a v-bind:href="'/documents/'+ fileUpload.data.id">Details</a>
                <hr>
            </div>
        </div>
        <div id="content2" class="content">
            <div v-for="myFileUpload in myFileUploads" :key="myFileUpload.id">
                <p>ID: {{ myFileUpload.data.id }} </p>
                <p>Name: {{ myFileUpload.data.name }} </p>
                <p>Pfad: {{ myFileUpload.data.path }} </p>
                <p>Erstellt von: {{ myFileUpload.data.user_id.name }}</p>
                <a download v-bind:href="'/upload/' + myFileUpload.name">Download: {{ myFileUpload.data.name }}</a>
                <a v-bind:href="'/mydocuments/'+ myFileUpload.data.id">Details</a>
                <hr>
            </div>
        </div> -->

        <br><br><br>

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
            }
        },
        mounted(){
            this.axios.get('http://127.0.0.1:8000/api/getFiles')
            .then(response=>{
                this.fileUploads = response.data.data;
            });

            this.axios.get('http://127.0.0.1:8000/api/getMyFiles')
            .then(response=>{
                this.myFileUploads = response.data.data;
            });

        },
        methods:{
            toggleTab(id, content){
                document.getElementById(id).classList.add('tab-active');
                document.querySelector('.content--active').classList.remove('content--active');
                document.getElementById(content).classList.add('content--active');
                if(id=='tab1'){
                    document.getElementById('tab2').classList.remove('tab-active');
                }
                else{
                    document.getElementById('tab1').classList.remove('tab-active');
                }
            }
        }
    }


</script>

<style scoped>
    .content {
        display: none;
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
        margin-top: 10px;
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
        max-width: 80%;
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
</style>
