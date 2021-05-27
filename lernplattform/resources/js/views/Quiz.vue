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
                    {{ quizName }}
                    <div v-if="started && !summary" class="unterüberschrift-oberer-bereich">Frage {{ currentQuestion }}/{{ questions.length }}</div>
                    <div v-else-if="summary" class="unterüberschrift-oberer-bereich">Zusammenfassung</div>
                    <div v-else class="unterüberschrift-oberer-bereich">Noch nicht begonnen</div>
                </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <!-- Content -->
        <!-- start quiz -->
        <div v-if="!started" class="fragen-container">
            <button @click="startQuiz()" class="mdc-button mdc-button--raised button--big button--small abstand-weg">
                <p class="button-text no-margin">Starte das Quiz</p>
                <span class="material-icons-outlined">play_circle</span>
            </button>
        </div>


        <!-- Questions -->
        <div v-if="!summary" class="fragen-container-forLoop-0height" v-for="question, index in questions" :key="question.id">
            <div class="fragen-container hide" :id='"frage"+question.id' ref="test">
                <div class="frage">
                    Frage {{index + 1}}:  {{question.question}}<br>
                </div>
                <div v-for="answer, index in question.answers" :key="answer.id">
                    <div v-if="!answered" class="antwort-container" @click="sendAnswer(answer, question.answers, question)">
                        <p class="antwort-optionen-buchstaben" :class='"answer"+answer.id' :id='"answerletter"+answer.id'>
                            <span v-if="index===0">A</span>
                            <span v-if="index===1">B</span>
                            <span v-if="index===2">C</span>
                            <span v-if="index===3">D</span>
                        </p>
                        <p class="antwort-optionen" :class='"answer"+answer.id' :id='"answerid"+answer.id'>
                            {{answer.answer}}
                        </p>
                    </div>
                    <div v-else class="antwort-container">
                        <p class="antwort-optionen-buchstaben" :class='"answer"+answer.id' :id='"answerletter"+answer.id'>
                            <span v-if="index===0">A</span>
                            <span v-if="index===1">B</span>
                            <span v-if="index===2">C</span>
                            <span v-if="index===3">D</span>
                        </p>
                        <p class="antwort-optionen" :class='"answer"+answer.id' :id='"answerid"+answer.id'>
                            {{answer.answer}}
                        </p>
                    </div>
                </div>
                <div v-if="!answered && !noNextQuestion" @click="skipQuestion(question)" class="überspringen">überspringen</div>
                <div v-else-if="answered && !noNextQuestion" @click="nextQuestion()" class="überspringen überspringen--fett">Nächste Frage</div>
                <div v-else @click="showSummary(question)" class="überspringen überspringen--fett">Ergebnisse</div>
            </div>
            <br>
        </div>

        <!-- Summary -->
        <div v-if="summary">
            <p>Richtig beantwortete Fragen:</p>
            <div v-for="question in userAnswers.correct" :key="question.id">
                {{ question.question }}
            </div>
            <br>
            <p>Anzahl richtige Antworten:</p>
            {{ userAnswers.correct.length }}
            <br>
            <hr>
            <p>Falsch beantwortete Fragen:</p>
            <div v-for="question in userAnswers.wrong" :key="question.id">
                {{ question.question }}
            </div>
            <br>
            <p>Anzahl falsche Antworten:</p>
            {{ userAnswers.wrong.length }}
            <br>
            <hr>
            <p>Ergebnis: {{ result }}% der Antworten waren richtig.</p>
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
                quizName: null,
                quizId: this.$route.params.quizid,
                questions: [],
                category: this.$route.params.category,
                answered: false,
                currentQuestion: 1,
                started: false,
                noNextQuestion: false,
                userAnswers: {
                    correct: [],
                    wrong: [],
                    result: 0,
                },
                summary: false,
            }
        },
        mounted(){
            axios.get('/api/quiz/questions/' + this.quizId)
            .then(response=>{
                this.questions = response.data;
            });

            axios.get('/api/quiz/id/' + this.quizId)
            .then(response=>{
                console.log(response.data);
                this.quizName = response.data.name;
            });


        },
        methods:{
            startQuiz(){
                this.started = true;
                document.getElementById("frage"+this.currentQuestion).classList.remove('hide');
            },
            sendAnswer(answer, allAnswers, question){
                // set answer status to true -> user cannot answer anymore
                this.answered = true;
                // get clicked DOM-Elements
                let clickedAnswerId = document.getElementById('answerid'+answer.id);
                let clickedAnswerLetter = document.getElementById('answerletter'+answer.id);

                // check answer
                if(answer.is_correct){
                    // color green if answer was right
                    clickedAnswerId.classList.add('correct');
                    clickedAnswerLetter.classList.add('correct-letter');

                    // Push the answer to user correct answers
                    this.userAnswers.correct.push(question);
                }else{
                    // color red if answer was wrong
                    clickedAnswerId.classList.add('wrong');
                    clickedAnswerLetter.classList.add('wrong-letter');

                    // search for correct answers and get DOM-Elements
                    let correctAnswerId;
                    let correctAnswerLetter;
                    for(var i =0; i<allAnswers.length; i++){
                        if(allAnswers[i].is_correct){
                            correctAnswerId = document.getElementById('answerid'+allAnswers[i].id);
                            correctAnswerLetter = document.getElementById('answerletter'+allAnswers[i].id);
                        }
                    }

                    // color correct answer green
                    correctAnswerId.classList.add('correct');
                    correctAnswerLetter.classList.add('correct-letter');

                    // Push the answer to user wrong answers
                    this.userAnswers.wrong.push(question);
                }

            },
            showNext(idToShow, idToRemove){
                document.getElementById('frage'+idToRemove).classList.add('hide');
                document.getElementById('frage'+idToShow).classList.remove('hide');
            },
            nextQuestion(){
                this.answered = false;
                this.showNext(this.currentQuestion+1, this.currentQuestion);
                this.currentQuestion++;

                // check if there is next Question
                if(this.currentQuestion == this.questions.length){
                    this.noNextQuestion = true;
                }
            },
            skipQuestion(question){
                this.answered = false;
                this.showNext(this.currentQuestion+1, this.currentQuestion);
                this.currentQuestion++;
                this.userAnswers.wrong.push(question);

                // check if there is next Question
                if(this.currentQuestion == this.questions.length){
                    this.noNextQuestion = true;
                }
            },
            showSummary(question){
                if(!this.answered){
                    this.userAnswers.wrong.push(question);
                }
                this.summary = true;
                let numberCorrectAnswers = this.userAnswers.correct.length;
                let numberAllQuestions = this.questions.length;
                let resultNotRounded = numberCorrectAnswers / numberAllQuestions  * 100;
                this.result = resultNotRounded.toFixed(2);

                let saveResult = {
                    quizid: this.quizId,
                    correctAnswers: this.result,
                    passed: false,
                }

                if(this.result >= 75) {
                    saveResult.passed = true;
                }

                axios.post('/api/quiz/saveResult', saveResult)
                .then(response=>{
                    console.log(response.data);
                });
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
        margin-bottom: 10px;
    }

    .fragen-container-forLoop-0height{
        height: 0;
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
        margin: auto 0;
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
        top: 50%;
        transform: translate(0, -50%);
        line-height: 25px;
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
        background: #C3F2D1;
        border: solid 2px #5BD96A;
    }

    .correct-letter{
        background: #5BD96A;
    }

    .wrong{
        background: #FAC4C5;
        border: solid 2px #DF6A6A;
    }

    .wrong-letter{
        background: #DF6A6A;
    }

    .no-margin{
        margin-top: 0;
        margin-bottom: 0;
    }

    .überspringen--fett{
        font-weight: bold;
    }


</style>
