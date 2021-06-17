<template>
    <div>
        <!-- Header [Search] -->
        <div class="header_wrapper">
            <div class="header header--search">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    Erstellen
                </div>
                <router-link to="/spa/Suche">
                    <span class="material-icons neumorph header_search">search</span>
                </router-link>
            </div>
        </div>

        <div class="background-container">
            <div class="background bunt">
                <span class="material-icons-outlined icon-für-oberen-Bereich icon-weiß">description</span>
                <div class="überschrift-oberer-Bereich text-weiß">Quiz erstellen</div>
            </div>

            <div class="fabriges-rechteck text-weiß bunt">
                <div class="weißes-rechteck"></div>
            </div>
        </div>


        <div class="content_wrapper">
                <div>
                        <div>
                            <!-- Select -->
                            <div class="headline-text-field">Kategorie wählen</div>
                            <select required class="mdc-button mdc-button--raised button--big dropdown" name="categories" v-model="quiz.category_id">
                                <option selected="selected" value="">Bitte wähle eine Kategorie aus </option>
                                <option v-for="categorie in categories" :key="categorie.name" :value="categorie.id">
                                    {{categorie.name}}
                                </option>
                            </select>
                            <!-- Select End -->
                        </div>
                        <br>

                        <div class="headline-text-field">Name des Quiz</div>
                            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                                <input required v-model="quiz.name" type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
                            </label>
                            <hr class="trennungslinie-dick">

                            <div class="fragen-container" v-for="question in quiz.questions" :key="question.index">
                                <h5>{{question.index}}.Frage</h5>
                                <div class="headline-text-field">Frage</div>
                                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                                    <input required v-model="question.question" type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
                                </label>
                            <div class="answer-container" v-for="answer in question.answers" :key="answer.id">
                                <div class="switch-container">
                                    <div class="headline-text-field answer-id-text">Antwort {{answer.id}}</div>
                                    <div>
                                        <toggle-button v-model="answer.is_correct" :value="false" :labels="{checked: 'Richtig', unchecked: 'Falsch'}" :width="65"/>
                                    </div>
                                </div>
                                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                                    <input maxlength="30" required v-model="answer.answer" type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
                                </label>
                            </div>
                        </div>

                        <button @click="addQuestion()" class="mdc-button mdc-button--raised button--big button-dashed-border mdc-card--new">
                            <span class="button-text">Weitere Frage</span> <span class="material-icons">add</span>
                        </button>

                        <hr class="trennungslinie-dick">
                        <button @click="createQuiz()" class="mdc-button mdc-button--raised button--big ohne-abstand" type="submit">
                            <span class="button-text">Quiz erstellen</span> <span class="material-icons">navigate_next</span>
                        </button>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
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
                quiz: {
                    category_id: '',
                    name: '',
                    questions: [{
                        index: 1,
                        question: '',
                        answers: [
                            {
                                id: 'A',
                                is_correct: false,
                                answer: '',
                            },
                            {
                                id: 'B',
                                is_correct: false,
                                answer: '',
                            },
                            {
                                id: 'C',
                                is_correct: false,
                                answer: '',
                            },
                            {
                                id: 'D',
                                is_correct: false,
                                answer: '',
                            }
                        ]
                    }],
                },
                categories: [],
                count: 2,
            }
        },

        mounted() {
            axios.get('/api/categories')
                .then(response=>{
                    this.categories = response.data;
                });
        },
        methods: {
            createQuiz(){

                var send = true;
                for(var i = 0; i<this.quiz.questions.length; i++){
                    var correctAnswers = 0;
                    for(var a = 0; a<this.quiz.questions[i].answers.length; a++){
                        console.log(this.quiz.questions[i].answers[a].answer);
                        if(this.quiz.questions[i].answers[a].is_correct){
                            correctAnswers++;
                        }
                        if(this.quiz.questions[i].answers[a].answer === ""){
                            Vue.$toast.error('Du musst alle Antworten ausfüllen.', {});
                            send = false;
                        }
                    }
                    if(correctAnswers != 1){
                        send = false;
                        Vue.$toast.error('Es kann immer nur eine einzige Antwort richtig sein', {});
                        break;
                    }
                    correctAnswers = 0;
                }



                if(this.quiz.questions.length<3){
                    send = false;
                    Vue.$toast.error('Du musst mindestens 3 Fragen erstellen', {});
                }

                if(send){
                    axios.post('/api/quiz/create',this.quiz)
                    .then(response=>{
                        console.log(response.data);
                        Vue.$toast.success('Quiz erfolgreich erstellt.', {});
                        this.$router.push({ path: '/spa/quizkategorie' });
                    }).catch(err => {
                        Vue.$toast.error('Etwas ist schief gelaufen, bitte prüfe alle Angaben und versuche es erneut.', {});
                    });
                }
            },

            addQuestion(){

                this.quiz.questions.push({
                    index: this.count,
                    answers: [
                        {
                            id: 'A',
                            is_correct: false,
                            answer: '',
                        },
                        {
                            id: 'B',
                            is_correct: false,
                            answer: '',
                        },
                        {
                            id: 'C',
                            is_correct: false,
                            answer: '',
                        },
                        {
                            id: 'D',
                            is_correct: false,
                            answer: '',
                        }
                    ],
                });
                this.count++;
            },

            deleteQuiz() {
                axios.get('/api/quiz/delete/'+22)
                .then(response=>{
                    console.log(response.data);
                    Vue.$toast.success('Quiz erfolgreich gelöscht.', {});
                    this.$router.push({ path: '/spa/quizkategorie' });
                });
            }
        }
    }
</script>

<style>
.answer-container{
    margin-top: 15px;
}

.switch-container{
    display: flex;
    justify-content: space-between;
}

.answer-id-text{
    margin: 0;
}

.fragen-container{
    margin-bottom: 15px;
}
</style>
