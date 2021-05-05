<template>
    <div>
        <h1>Meine Uploads</h1>
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

        <div class="container-uploads">
                <div class="file-name-upload">Java Syntax</div>
                <span class="material-icons-outlined upload-showmore-icon">more_horiz</span>
        </div>
        <div class="container-uploads">
                <div class="file-name-upload">Vorlesungsskript Java Basics</div>
                <span class="material-icons-outlined upload-showmore-icon">more_horiz</span>
        </div>
        <div class="container-uploads">
                <div class="file-name-upload">Java: Build To Do App Fast </div>
                <span class="material-icons-outlined upload-showmore-icon">more_horiz</span>
        </div>
        <div class="container-uploads">
                <div class="file-name-upload">Java: Build To bla</div>
                <span class="material-icons-outlined upload-showmore-icon">more_horiz</span>
        </div>
        <div class="container-uploads">
                <div class="file-name-upload">Java: Build To bla</div>
                <span class="material-icons-outlined upload-showmore-icon">more_horiz</span>
        </div>
        <div class="container-uploads">
                <div class="file-name-upload">Java: Build To bla</div>
                <span class="material-icons-outlined upload-showmore-icon">more_horiz</span>
        </div>
        <div class="container-uploads">
                <div class="file-name-upload">Java: Build To bla</div>
                <span class="material-icons-outlined upload-showmore-icon">more_horiz</span>
        </div>
        <div class="container-uploads">
                <div class="file-name-upload">Java: Build To bla</div>
                <span class="material-icons-outlined upload-showmore-icon">more_horiz</span>
        </div>
        <div class="container-uploads">
                <div class="file-name-upload">Java: Build To bla</div>
                <span class="material-icons-outlined upload-showmore-icon">more_horiz</span>
        </div>

        <div class="tab-bar">
            <button @click="toggleTab('tab1', 'content1')" id="tab1" class="mdc-button tab-button">
                <span class="button-text button-text--mittig">Alle Dateien</span>
            </button>
            <button @click="toggleTab('tab2', 'content2')" id="tab2" class="mdc-button tab-button">
                <span class="button-text button-text--mittig">Meine Dateien</span>
            </button>
        </div>
            <!-- <div class="mdc-tab-bar" role="tablist">
            <div class="mdc-tab-scroller mdc-tab-scroller-overflow">
                <div class="mdc-tab-scroller__scroll-area">
                <div class="mdc-tab-scroller__scroll-content">
                    <button class="mdc-tab mdc-tab--active mdc-button mdc-button--raised" role="tab" aria-selected="true" tabindex="0">
                    <span class="mdc-tab__content">
                        <span class="mdc-tab__text-label">Alle Dateien</span>
                    </span>
                    <span class="mdc-tab-indicator mdc-tab-indicator--active">
                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                    </span>
                    <span class="mdc-tab__ripple"></span>
                    </button>
                    <button class="mdc-tab mdc-tab mdc-button mdc-button--raised" role="tab" aria-selected="true" tabindex="0">
                    <span class="mdc-tab__content">
                        <span class="mdc-tab__text-label">Meine Uploads</span>
                    </span>
                    <span class="mdc-tab-indicator mdc-tab-indicator">
                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                    </span>
                    <span class="mdc-tab__ripple"></span>
                    </button>
                </div>
                </div>
            </div>
            </div> -->
        <div id="content1" class="content content--active">
            <div v-for="fileUpload in fileUploads" :key="fileUpload.id">
                <p>ID: {{ fileUpload.id }} </p>
                <p>Name: {{ fileUpload.name }} </p>
                <p>Pfad: {{ fileUpload.path }} </p>
                <a download v-bind:href="'/upload/' + fileUpload.name">Download: {{ fileUpload.name }}</a>
                <hr>
            </div>
        </div>
        <div id="content2" class="content">
        <p>Content two</p>
        </div>



    </div>


</template>

<script>
import {MDCTabBar} from '@material/tab-bar';

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
            //const tabBar = new MDCTabBar(document.querySelector('.mdc-tab-bar'));
            var tabBar = new mdc.tabBar.MDCTabBar(document.querySelector('.tab-bar'));
            var contentEls = document.querySelectorAll('.content');
            console.log(tabBar);
            tabBar.listen('MDCTabBar:activated', function(event) {
            // Hide currently-active content
            console.log("Moritz ist cool");
            document.querySelector('.content--active').classList.remove('content--active');
            // Show content for newly-activated tab
            contentEls[event.detail.index].classList.add('content--active');
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
    }

    .upload-showmore-icon{
        padding-right: 20px;
    }

</style>
