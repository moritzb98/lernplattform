<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    Quizdetail
                </div>
            </div>
        </div>

        <div class="background-container">
            <div :style="{ backgroundColor: colorBackground }" class="background">
                <span :style="{ color: colorIcon }" class="material-icons-outlined icon-für-oberen-Bereich">{{icon}}</span>
                <div :style="{ color: color }" class="überschrift-oberer-Bereich" >
                    {{ category }}
                    <div :style="{ color: colorText }" class="unterüberschrift-oberer-bereich">Quiz Übersicht</div>
                </div>
            </div>
            <div :style="{ backgroundColor: colorBackground }" class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <!-- Content -->
        <div v-for="(quiz, index) in quizzes" :key="quiz.data.name">
            <router-link :to='"/spa/quiz/"+category+"/"+quiz.data.id'>
                <div :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white, '+ quiz.data.category_id.color  + ')' }" class="quiz-detail-container">
                    <div class="flex-container-quiz router-text">
                        <div class="progress-container">
                            <div>
                                {{ quiz.data.name }}
                            </div>
                            <div class="progressbar">
                                <progress-bar :bar-color="quiz.data.category_id.color" :val="values[index]" size="medium"></progress-bar>
                            </div>
                        </div>
                        <div>
                            <span :style="{ color: quiz.data.category_id.color }" class="material-icons-outlined play-icon">play_circle_filled</span>
                        </div>
                    </div>
                </div>
            </router-link>
            <br>
        </div>

        <!-- Nav -->
        <Nav />
    </div>
</template>

<script>
import ProgressBar from 'vue-simple-progress'
    export default {
        components: {
            ProgressBar
        },
        data() {
            return {
                quizzes: [],
                category: this.$route.params.category,
                questionId: null,
                values: [],
                quizzesForResult: [],
                colorBackground: "",
                colorIcon: "",
                colorText: "",
                color: "",
                icon: "",
            }
        },
        mounted(){
            axios.get('/api/quiz/collection/' + this.category)
            .then(response=>{
                this.quizzes = response.data.data;
                this.color = response.data.data[0].data.category_id.color;
                this.colorBackground = this.hexToRgbA(response.data.data[0].data.category_id.color,0.4);
                this.colorIcon = this.hexToRgbA(response.data.data[0].data.category_id.color,0.5);
                this.colorText = this.hexToRgbA(response.data.data[0].data.category_id.color,0.7);
                this.icon = response.data.data[0].data.category_id.icon;
            });

            axios.get('/api/quiz/' + this.category)
            .then(response=>{
                this.quizzesForResult = response.data;

                axios.post('https://secret-cove-11178.herokuapp.com/api/quiz/id/result/', this.quizzesForResult)
                .then(response=>{
                    for(var i = 0; i<response.data.length; i++){
                        if(response.data[i]){
                            this.values.push(response.data[i].correctAnswers);
                        } else {
                            this.values.push(0);
                        }
                    }
                });
                console.log(this.quizzes);
            });

        },
        methods:{
            hexToRgbA(hex, opacity){
                var c;
                if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
                    c= hex.substring(1).split('');
                    if(c.length== 3){
                        c= [c[0], c[0], c[1], c[1], c[2], c[2]];
                    }
                    c= '0x'+c.join('');
                    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+','+opacity+')';
                }
                throw new Error('Bad Hex');
            },

        }
    }
</script>

<style scoped>

.progress-container {
    width: 80%;
}

.progressbar{
    margin-top: 8px;
    border-radius: 50px;
    overflow: hidden;
}

</style>
