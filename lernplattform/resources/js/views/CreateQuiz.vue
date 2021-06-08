<template>
    <div>
        <h1>Quiz erstellen</h1>

        <button @click="createQuiz()">Create Test</button>
        <button @click="deleteQuiz()">Delete Test</button>

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
                    questions: [],
                    answers: []
                }
            }
        },

        mounted() {

        },
        methods: {
            createQuiz(){
                this.quiz.category_id = 1;
                this.quiz.name = "Test";
                this.quiz.questions.push('Was ist cool?');
                this.quiz.questions.push('Was ist blöd?');
                this.quiz.answers.push({answer: 'Ich', is_correct: false});
                this.quiz.answers.push({answer: 'Du', is_correct: false});
                this.quiz.answers.push({answer: 'Moritz', is_correct: true});
                this.quiz.answers.push({answer: 'Keiner', is_correct: false});
                this.quiz.answers.push({answer: 'Er', is_correct: false});
                this.quiz.answers.push({answer: 'Sie', is_correct: false});
                this.quiz.answers.push({answer: 'Norman', is_correct: true});
                this.quiz.answers.push({answer: 'Alle', is_correct: false});

                axios.post('/api/quiz/create',this.quiz)
                .then(response=>{
                    console.log(response.data);
                    Vue.$toast.success('Quiz erfolgreich erstellt.', {});
                    this.$router.push({ path: '/spa/quizkategorie' });
                });
            },

            deleteQuiz() {
                axios.get('/api/quiz/delete/'+22)
                .then(response=>{
                    console.log(response.data);
                    /* Vue.$toast.success('Quiz erfolgreich gelöscht.', {});
                    this.$router.push({ path: '/spa/quizkategorie' }); */
                });
            }
        }
    }
</script>
