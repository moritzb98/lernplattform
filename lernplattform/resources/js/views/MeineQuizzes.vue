<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    {{title}}
                </div>
            </div>
        </div>

        <!-- Content  -->
        <!-- <div v-for="(quiz, index) in quizzes" :key="index">
            <div class="neumorph card-small mb-2">
                {{quiz.name}}
            </div>
        </div> -->

        <div v-for="(quiz, index) in quizzes" :key="index">
            <div class="kategorie-container search-overwrite mb-2">
                <div class="kategorie-icon-container">
                    <span :style="{ color: quiz.data.category_id.color }" class="material-icons-outlined quiz-kategorie-icon">{{quiz.data.category_id.icon}}</span>
                </div>
                <div :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white, '+ quiz.data.category_id.color  + ')' }" class="quiz-kategorie-container">
                    <div v-text="quiz.data.name"></div>

                    <!-- Optionen Menü -->
                    <md-menu md-size="small">
                        <md-button md-menu-trigger class="card-small_dropdown-btn">
                            <span class="material-icons">more_vert</span>
                        </md-button>

                        <md-menu-content class="card-small_dropdown">
                            <!-- <md-menu-item>
                                <router-link :to='"/spa/Lerngruppen/"+room.id+"/Bearbeiten"'>
                                    <div class="card-small_controls_item">
                                        <span class="material-icons">edit</span> Bearbeiten
                                    </div>
                                </router-link>
                            </md-menu-item> -->
                            <md-menu-item>
                                <div class="card-small_controls_item" @click="deleteQuiz(quiz.data.id)">
                                    <span class="material-icons">delete</span> Löschen
                                </div>
                            </md-menu-item>
                        </md-menu-content>
                    </md-menu>
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
                title: "Meine Quiz",
                quizzes: [],
            }
        },
        methods: {
            getmyQuizzes() {
                axios.get('/api/myquiz')
                    .then(response=>{
                        this.quizzes=response.data.data
                        console.log(response.data);
                    })
            },
            deleteQuiz(quizid){
                this.axios.post('/api/quiz/delete/' + quizid)
                    .then(response => {
                        console.log(response);
                        Vue.$toast.error('Quiz erfolgreich gelöscht.', {});
                        this.$router.go();
                    })
            },
        },
        mounted() {
            this.getmyQuizzes()
        }
    }
</script>

<style scoped>
    .card-icons--new{
        font-size: 7em;
        color: #212121;
    }

    .container-link{
        display: block;
        width: 45%;
        color: #212121;
    }

    .md-menu {
        position: absolute;
        right: 0;
        top: 2px;
        width: 70px;
    }



</style>
