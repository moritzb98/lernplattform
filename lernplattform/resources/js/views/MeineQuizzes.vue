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
        <div v-for="(quiz, index) in quizzes" :key="index">
            <div class="neumorph card-small mb-2">
                {{quiz}}
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
                        console.log(response.data);
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



</style>
