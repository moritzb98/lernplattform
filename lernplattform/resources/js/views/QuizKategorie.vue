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
        <div class="content_wrapper">
            <router-link to="/spa/Quiz-erstellen">
                <button class="btn neumorph btn--dashed w-100 mb-3">
                    <span class="btn_text mdc-button__label ">Quiz erstellen</span>
                    <span class="btn_icon material-icons">add</span>
                </button>
            </router-link>

            <router-link to="/spa/Auszeichnungen">
                <button class="btn neumorph w-100 mb-3">
                    <span class="btn_text mdc-button__label ">Meine Auszeichnungen</span>
                    <span class="btn_icon material-icons">military_tech</span>
                </button>
            </router-link>

            <!-- <a href="/spa/Auszeichnungen" class="button-link button-link--mittig">
                <button class="mdc-button mdc-button--raised button--big button--small abstand-weg">
                    <span class="button-text">Meine Auszeichnungen</span> <span class="material-icons">military_tech</span>
                </button>
            </a> -->

            <div class="router-text" v-for="quizOb in quiz" :key="quizOb.id">
                <router-link :to='"/spa/quiz/"+quizOb.name'>
                    <div class="kategorie-container">
                        <div class="kategorie-icon-container">
                            <span :style="{ color: quizOb.color }" class="material-icons-outlined quiz-kategorie-icon">{{quizOb.icon}}</span>
                        </div>
                        <div :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white, '+ quizOb.color  + ')' }" class="quiz-kategorie-container">
                            <div>{{quizOb.name}}</div>
                            <div class="play-now-text">Jetzt spielen</div>
                        </div>
                    </div>
                </router-link>
                <br>
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
                quiz: [],
            }
        },
        mounted(){
            axios.get('/api/categories/quiz')
            .then(response=>{
                //this.quiz = response.data.data;
                let quizzes = response.data.data;
                for(var i = 0; i < quizzes.length; i++){
                    var checkQuiz = {
                        name: quizzes[i].data.category_id.name,
                        color: quizzes[i].data.category_id.color,
                        id: quizzes[i].data.id,
                        icon: quizzes[i].data.category_id.icon,
                    }
                    if(this.quiz.some(quiz => quiz.name === checkQuiz.name)){
                        console.log("Kategorie schon vorhanden!")
                    }else{
                        this.quiz.push({name: checkQuiz.name, color: checkQuiz.color, id: checkQuiz.id, icon: checkQuiz.icon});
                    }
                }
                console.log(this.quiz);
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
        border: double 2px transparent;
        border-radius: 28px;
        background-image: radial-gradient(white, white), radial-gradient(circle at top left,white,#ED553B);
        background-origin: border-box;
        background-clip: content-box, border-box;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .play-now-text{
        font-style: italic;
        color: #474747;
        font-size: 0.8em;
    }

</style>
