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

        <!-- Nav -->
        <Nav />
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



</style>
