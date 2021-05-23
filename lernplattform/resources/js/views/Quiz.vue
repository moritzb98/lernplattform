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
                    <div class="unterüberschrift-oberer-bereich">Frage 02/15</div>
                </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <!-- Content -->
        <div v-for="question, index in questions" :key="question.id">
            <div class="fragen-container">
                <div class="frage">
                    Frage {{index + 1}}:  {{question.question}}<br>
                </div>
                <div class="antwort-container" v-for="answer, index in question.answers" :key="answer.id">
                    <div class="antwort-optionen-buchstaben">
                        A
                    </div>
                    <div class="antwort-optionen">
                        Antwort {{index + 1}}: {{answer.answer}}
                    </div>
                </div>
                <div class="überspringen">überspringen</div>
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
            }
        },
        mounted(){
            axios.get('/api/quiz/questions/' + this.quizId)
            .then(response=>{
                console.log("Rückgabe: ", response.data);
                this.questions = response.data;
            });

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

    .fragen-container{
        border-radius: 20px;
        padding: 20px;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow: -5px -5px 13px #fff, 5px 5px 13px #0e0e0e40;
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


</style>
