<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    Quiz Kategorien
                </div>
            </div>
        </div>
         <div class="background-container">
            <div class="background">
                <div class="überschrift-oberer-Bereich">Los geht’s, prüfe Dein Wissen in einem Quiz! </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <!-- Content -->
        <div v-for="category in categorieNames" :key="categorieNames.name">
            {{ category }}
            <br>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categorieNames: [],
            }
        },
        mounted(){
            axios.get('/api/categories/quiz')
            .then(response=>{
                console.log(response.data.data);
                let quizzes = response.data.data;
                for(var i=0; i< quizzes.length; i++){
                    if(!this.categorieNames.includes(quizzes[i].data.category_id.name)){
                        this.categorieNames.push(quizzes[i].data.category_id.name);
                    }
                }
            });

        },
        methods:{

        }
    }
</script>

<style scoped>
.background-container{
        width: 100vw;
        margin-left: -16px;
    }

    .background{
        width: 100%;
        height: 120px;
        background-color: #F1D2CD;
        border-radius: 0px 0px 0px 30px;
        display: flex;
        flex-wrap: nowrap;
        position: relative;
    }

    .fabriges-rechteck{
        width: 100%;
        height: 50px;
        background-color: #F1D2CD;
    }

    .weißes-rechteck{
        width: 100%;
        height: 52px;
        background-color: #F1F1F1;
        border-radius: 0px 60px 0px 0px;
    }

    .überschrift-oberer-Bereich{
        font-size: 1.5em;
        color: #ED553B;
        font-weight: bold;
        margin: auto;
        max-width: 80%;
    }

</style>
