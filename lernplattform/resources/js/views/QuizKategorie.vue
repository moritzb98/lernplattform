<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    Quiz Kategorien
                </div>
            </div>
        </div>
         <div class="background-container">
            <div class="background">
                <div class="überschrift-oberer-Bereich">Los geht’s, prüfe Dein Wissen in einem Quiz! </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <!-- Content -->
        <a href="/spa/documents" class="button-link button-link--mittig">
            <button class="mdc-button mdc-button--raised button--big button--small abstand-weg">
                <span class="button-text">Meine Auszeichnungen</span> <span class="material-icons">military_tech</span>
            </button>
        </a>
        <br>

        <div v-for="category in categorieNames" :key="categorieNames.name">
            <router-link :to='"/spa/quiz/"+category'>
                <div class="kategorie-container">
                    <div class="kategorie-icon-container">
                        <span class="material-icons-outlined quiz-kategorie-icon">biotech</span>
                    </div>
                    <div class="quiz-kategorie-container">
                        <div>{{category}}</div>
                        <div class="play-now-text">Jetzt spielen</div>
                    </div>
                </div>

            </router-link>
            <br>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categorieNames: [],

            }
        },
        mounted(){
            axios.get('/api/categories/quiz')
            .then(response=>{
                let quizzes = response.data.data;
                for(var i=0; i< quizzes.length; i++){
                    if(!this.categorieNames.includes(quizzes[i].data.category_id.name)){
                        this.categorieNames.push(quizzes[i].data.category_id.name);
                    }
                }
            });

        },
        methods:{

        }
    }
</script>

<style scoped>
.background-container{
        width: 100vw;
        margin-left: -16px;
    }

    .background{
        width: 100%;
        height: 120px;
        background-color: #F1D2CD;
        border-radius: 0px 0px 0px 30px;
        display: flex;
        flex-wrap: nowrap;
        position: relative;
    }

    .fabriges-rechteck{
        width: 100%;
        height: 50px;
        background-color: #F1D2CD;
    }

    .weißes-rechteck{
        width: 100%;
        height: 52px;
        background-color: #F1F1F1;
        border-radius: 0px 60px 0px 0px;
    }

    .überschrift-oberer-Bereich{
        font-size: 1.5em;
        color: #ED553B;
        font-weight: bold;
        margin: auto;
        max-width: 80%;
        line-height: 25px;
    }

    .abstand-weg{
        margin-top: 0px;
    }

    .button--small{
        height: 40px;
        width: 75%;
    }

    .button-link--mittig{
        display: flex;
        justify-content: center;
    }

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
    }

    .play-now-text{
        font-style: italic;
        color: #474747;
        font-size: 0.8em;
    }

</style>
