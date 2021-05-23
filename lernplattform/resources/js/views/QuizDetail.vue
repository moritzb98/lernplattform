<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    Quizdetail - {{ category }}
                </div>
            </div>
        </div>

        <div class="background-container">
            <div class="background">
                <span class="material-icons-outlined icon-für-oberen-Bereich">biotech</span>
                <div class="überschrift-oberer-Bereich" >
                    {{ category }}
                    <div class="unterüberschrift-oberer-bereich">Quiz Übersicht</div>
                </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <!-- Content -->
        <div v-for="quiz in quizzes" :key="quiz.name">
            <router-link :to='"/spa/quiz/"+category+"/"+quiz.id'>
                <div class="quiz-detail-container">
                    <div class="flex-container-quiz router-text">
                        <div>
                            <div>
                                {{ quiz.name }}
                            </div>
                            <div>
                                progess
                            </div>
                        </div>
                        <div>
                            <span class="material-icons-outlined play-icon">play_circle_filled</span>
                        </div>
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
                quizzes: [],
                category: this.$route.params.category,
                questionId: null,
            }
        },
        mounted(){
            axios.get('/api/quiz/' + this.category)
            .then(response=>{
                this.quizzes = response.data;
            });
        },
        methods:{

        }
    }
</script>

<style scoped>

    .quiz-detail-container{
        height: 65px;
        width: 100%;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow: -5px -5px 13px #fff, 5px 5px 13px #0e0e0e40;
        border: double 2px transparent;
        border-radius: 28px;
        background-image: radial-gradient(white, white), radial-gradient(circle at top left,white,#ED553B);
        background-origin: border-box;
        background-clip: content-box, border-box;
    }

    .flex-container-quiz{
        display: flex;
        margin: 10px;
        margin-left: 30px;
        margin-right: 30px;
        justify-content: space-between;
    }

    .play-icon{
        font-size: 3em;
    }

</style>
