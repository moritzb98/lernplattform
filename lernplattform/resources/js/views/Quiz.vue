<template>
    <div>
        <h1>Quiz - </h1>

        <!-- Content -->

    </div>
</template>

<script>
    export default {
        data() {
            return {
                quizId: this.$route.params.quizid,
                questionId: this.$route.params.questionid,
            }
        },
        mounted(){
            console.log("QuizId: ", this.quizId);
            console.log("QuestionId: ", this.questionId);
        },
        methods:{

        }
    }
</script>

<style scoped>


</style>
