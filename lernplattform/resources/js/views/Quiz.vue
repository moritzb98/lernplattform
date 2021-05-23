<template>
    <div>
        <h1>Quiz - </h1>

        <!-- Content -->
        <div v-for="question, index in questions" :key="question.id">
            Frage {{index + 1}}:  {{question.question}}<br>
            <div v-for="answer, index in question.answers" :key="answer.id">
                Antwort {{index + 1}}: {{answer.answer}}
            </div>

            <br>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                quizId: this.$route.params.quizid,
                questions: [],
            }
        },
        mounted(){
            axios.get('/api/quiz/questions/' + this.quizId)
            .then(response=>{
                console.log("Rückgabe: ", response.data);
                this.questions = response.data;
            });


        },
        methods:{
        }
    }
</script>

<style scoped>


</style>
