<template>
    <div>
        <h1>Quizdetail - {{ category }}</h1>
        <!-- Content -->
        <div v-for="quiz in quizzes" :key="quiz.name">
            <router-link :to='"/spa/quiz/"+category+"/"+quiz.id'>
                {{ quiz.name }}
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


</style>
