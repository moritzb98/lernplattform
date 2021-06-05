<template>
    <div class="">
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    Quiz-Übersicht
                </div>
            </div>
        </div>
         <div class="background-container">
            <div class="background">
                <div class="überschrift-oberer-Bereich"> Deine Auszeichnungen </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <div class="router-text">
            <router-link to=''>
                <div class="kategorie-container">
                    <div class="kategorie-icon-container">
                        <span class="material-icons-outlined quiz-kategorie-icon">biotech</span>
                    </div>
                    <div class="quiz-kategorie-container">
                        <div class="quiz-inhalt-container">
                            <div>Beginner</div>
                            <div class="progressbar">
                                <progress-bar :val="50" size="medium"></progress-bar>
                            </div>
                            <div class="anzahl-quiz-text">
                                Noch 3 Quiz spielen!
                            </div>
                        </div>
                    </div>
                </div>
            </router-link>
            <br>
        </div>

                <div class="router-text">
            <router-link to=''>
                <div class="kategorie-container">
                    <div class="kategorie-icon-container">
                        <span class="material-icons-outlined quiz-kategorie-icon">biotech</span>
                    </div>
                    <div class="quiz-kategorie-container">
                       <div class="flex-container-auszeichnung">
                           <div class="quiz-inhalt-container weniger-breit">
                            <div>Beginner</div>
                            <div class="progressbar">
                                <progress-bar :val="0" size="medium"></progress-bar>
                            </div>
                        </div>

                        <div>
                            <span class="material-icons-outlined lock">lock</span>
                        </div>
                       </div>


                    </div>
                </div>
            </router-link>
            <br>
        </div>
    </div>
</template>

<script>
import ProgressBar from 'vue-simple-progress'

    export default {
        components: {
            ProgressBar
        },
        data: function () {
            return {
            }
        },
        methods : {

        },
        mounted : {

        }

    }
</script>

<style>
    .kategorie-container{
        flex-wrap: nowrap;
        display: flex;
        align-items: center;
        position: relative;
    }

    .kategorie-icon-container{
        border-radius: 22px;
        height: 75px;
        width: 75px;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow: -5px -5px 13px #fff, 5px 5px 13px #0e0e0e40;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2;
    }

    .quiz-kategorie-icon{
        font-size: 3.2em;
        margin: auto;
    }

    .quiz-kategorie-container{
        border-radius: 22px;
        height: 65px;
        width: 100%;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow: -5px -5px 13px #fff, 5px 5px 13px #0e0e0e40;
        text-align: center;
        position: absolute;
        border: double 2px transparent;
        border-radius: 28px;
        background-image: radial-gradient(white, white), radial-gradient(circle at top left,white,#ED553B);
        background-origin: border-box;
        background-clip: content-box, border-box;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .anzahl-quiz-text{
        font-size: 0.7em;
        font-style: italic;
        font-weight: lighter;
    }

    .quiz-inhalt-container{
        width: 65%;
        margin-left: 90px;
        text-align: left;
    }

    .progressbar{
        margin-top: 8px;
        border-radius: 50px;
        overflow: hidden;
    }

    .flex-container-auszeichnung{
        display: flex;
        justify-content: space-between;
    }

    .weniger-breit{
        width: 55%;
    }

    .lock{
        margin-right: 20px;
    }
</style>
