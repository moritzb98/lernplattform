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

        <!-- Content -->
        <div class="background-container">
            <div class="background bunt">
                <span class="material-icons-outlined icon-für-oberen-Bereich icon-weiß">military_tech</span>
                <div class="überschrift-oberer-Bereich text-weiß" >Auszeichnungen</div>
            </div>

            <div class="fabriges-rechteck bunt">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <div class="router-text" v-for="badge in badges" :key="badge.data.badge_id.id">
            <router-link to=''>
                <div class="kategorie-container">
                    <div class="kategorie-icon-container" :class="{ notAchievedContainer: !badge.data.achieved }">
                        <span class="material-icons-outlined quiz-kategorie-icon" :class="{ notAchievedIcon: !badge.data.achieved }">military_tech</span>
                    </div>
                     <div class="quiz-kategorie-container">
                        <div class="flex-container-auszeichnung">
                            <div class="quiz-inhalt-container weniger-breit">
                                <div>{{ badge.data.badge_id.name }}</div>
                                <div class="progressbar">
                                    <progress-bar :val="badge.data.progress" size="medium" :bar-color="badge.data.color"></progress-bar>
                                </div>
                                <div v-if="badge.data.progress < 100" class="anzahl-quiz-text">
                                    Noch {{ badge.data.badge_id.goal - passedQuiz }} Quiz spielen!
                                </div>
                            </div>
                            <div v-if="!badge.data.achieved" class="icon-flexbox">
                                <span class="material-icons-outlined lock">lock</span>
                            </div>
                       </div>


                    </div>
                </div>
            </router-link>
            <br>
        </div>

        <!-- Nav -->
        <Nav />
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
                results: [],
                badges: [],
                passedQuiz: 0
            }
        },
        methods : {

        },
        mounted(){
            axios.get('/api/results').then(response => {
                this.results = response.data;
                console.log("results", this.results);

                axios.get('/api/userbadges').then(response => {
                    this.badges = response.data.data;
                    console.log("badges", response.data.data);

                    for(var i=0; i<this.results.length; i++){
                        if(this.results[i].passed){
                            this.passedQuiz++;
                        }
                    }

                    for (var i=0; i<this.badges.length; i++){
                        this.badges[i].data.progress = this.passedQuiz / this.badges[i].data.badge_id.goal * 100;

                        if(this.badges[i].data.progress < 10){
                            this.badges[i].data.color = 'red';
                        }else if(this.badges[i].data.progress < 50){
                            this.badges[i].data.color = 'orange';
                        }else if(this.badges[i].data.progress < 80){
                            this.badges[i].data.color = 'yellow';
                        }else{
                            this.badges[i].data.color = 'green';
                        }
                    }
                });
            });


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
        margin-right: 14px;
        font-size: 2.2em;
    }

    .icon-flexbox{
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .notAchievedContainer{
        background: grey;
    }

    .notAchievedIcon{
        opacity: 0.3;
    }
</style>
