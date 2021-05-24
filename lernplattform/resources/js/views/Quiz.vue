<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                     {{ category }} - Quiz
                </div>
            </div>
        </div>

        <div class="background-container">
            <div class="background">
                <span class="material-icons-outlined icon-für-oberen-Bereich">biotech</span>
                <div class="überschrift-oberer-Bereich" >
                    {{ category }}
                    <div class="unterüberschrift-oberer-bereich">Frage {{ currentQuestion }}/{{ questions.length }}</div>
                </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <!-- Content -->
        <p v-if="!started" @click="startQuiz()">Starte das Quiz</p>
        <div v-for="question, index in questions" :key="question.id">
            <div class="fragen-container hide" :id='"frage"+question.id' ref="test">
                <div class="frage">
                    Frage {{index + 1}}:  {{question.question}}<br>
                </div>
                <div v-for="answer, index in question.answers" :key="answer.id">
                    <div v-if="!answered" class="antwort-container" @click="sendAnswer(answer, question.answers)">
                        <p class="antwort-optionen-buchstaben" :class='"answer"+answer.id'>
                            A
                        </p>
                        <p class="antwort-optionen" :class='"answer"+answer.id'>
                            Antwort {{index + 1}}: {{answer.answer}}
                        </p>
                    </div>
                    <div v-else class="antwort-container">
                        <p class="antwort-optionen-buchstaben" :class='"answer"+answer.id'>
                            A
                        </p>
                        <p class="antwort-optionen" :class='"answer"+answer.id'>
                            Antwort {{index + 1}}: {{answer.answer}}
                        </p>
                    </div>
                </div>
                <div v-if="!answered" @click="skipQuestion()" class="überspringen">überspringen</div>
                <div v-else @click="nextQuestion()" class="überspringen">Nächste Frage</div>
            </div>
            <br>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                quizId: this.$route.params.quizid,
                questions: [],
                category: this.$route.params.category,
                answered: false,
                currentQuestion: 1,
                started: false,
            }
        },
        mounted(){
            axios.get('/api/quiz/questions/' + this.quizId)
            .then(response=>{
                this.questions = response.data;
            });


        },
        methods:{
            startQuiz(){
                this.started = true;
                document.getElementById("frage"+this.currentQuestion).classList.remove('hide');
            },
            sendAnswer(answer, allAnswers){
                // set answer status to true -> user cannot answer anymore
                this.answered = true;
                // get clicked DOM-Elements
                let clickedAnswers = document.getElementsByClassName('answer'+answer.id);

                // check answer
                if(answer.is_correct){
                    // color green if answer was right
                    for(var i=0; i<clickedAnswers.length; i++){
                        clickedAnswers[i].classList.add('correct');
                    };
                }else{
                    // color red if answer was wrong
                    for(var i=0; i<clickedAnswers.length; i++){
                        clickedAnswers[i].classList.add('wrong');
                    };

                    // search for correct answers and get DOM-Elements
                    let correctAnswers;
                    for(var i =0; i<allAnswers.length; i++){
                        if(allAnswers[i].is_correct){
                            correctAnswers = document.getElementsByClassName('answer'+allAnswers[i].id);
                        }
                    }

                    // color correct answer green
                    for(var i=0; i<correctAnswers.length; i++){
                        correctAnswers[i].classList.add('correct');
                    };
                }

            },
            nextQuestion(){
            }
        }
    }
</script>


<style scoped>

    .fragen-container{
        border-radius: 20px;
        padding: 20px;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow: -5px -5px 13px #fff, 5px 5px 13px #0e0e0e40;
    }

    .hide{
        display: none;
    }

    .antwort-container{
        display: flex;
        flex-wrap: nowrap;
        position: relative;
    }

    .antwort-optionen-buchstaben{
        border-radius: 40px;
        height: 45px;
        width: 45px;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow: -5px -5px 13px #fff, 5px 5px 13px #0e0e0e40;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2;
        font-size: 1.5em;
        font-weight: bold;
    }

    .antwort-optionen{
        margin: auto 0;
        border-radius: 22px;
        height: 30px;
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
    }

    .frage{
        margin-bottom: 20px;
    }

    .überspringen{
        text-transform: uppercase;
        font-weight: lighter;
        color: #212121;
        text-align: center;
        margin-top: 10px;
    }

    .correct{
        background: green;
    }

    .wrong{
        background: red;
    }


</style>
