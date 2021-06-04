<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    {{ karteikartenset.name }}
                </div>
            </div>
        </div>

        <div class="background-container">
            <div class="background">
                <span class="material-icons-outlined icon-für-oberen-Bereich">biotech</span>
                <div class="überschrift-oberer-Bereich" >
                     {{ category.name }}
                    <div class="unterüberschrift-oberer-bereich">Karteikarte {{ count +1 }}/{{ karteikartenset.karteikarten.length }}</div>
                </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <div v-for="(karteikarte, index) in karteikartenset.karteikarten" :key="karteikarte.id" class="">
            <div v-if="karteikarte.showFront" class="fragen-container fragen-container--big front space-after">
                <span @click="spinCard(index)" class="material-icons-outlined turn-around">autorenew</span>
                <div class="karteikarte-inhalt">
                    {{karteikarte.frontside}}
                </div>
                <div v-if="!lastCard && count === index" @click="nextCard(index)" class="überspringen">
                    Überspringen
                </div>
                <div v-else class="überspringen"></div>

            </div>
            <div v-if="karteikarte.showBack" class="fragen-container fragen-container--big back space-after">
                <span @click="spinCard(index)" class="material-icons-outlined turn-around">autorenew</span>
                <div class="karteikarte-inhalt">
                    {{karteikarte.backside}}
                </div>
                <div v-if="!lastCard && count === index" @click="nextCard(index)" class="überspringen">
                    Überspringen
                </div>
                <div v-else class="überspringen"></div>
            </div>

            <button v-if="!lastCard && count === index" @click="nextCard(index)" class="mdc-button mdc-button--raised button--big button--small abstand-weg button--border schmaler space-after">
                <p class="button-text no-margin">Nächste Karte</p>
                <span class="material-icons-outlined">chevron_right</span>
            </button>

            <button v-if="!firstCard && count === index" @click="cardBack(index)" class="mdc-button mdc-button--raised button--big button--small abstand-weg button--border schmaler">
                <span class="material-icons-outlined">chevron_left</span>
                <p class="button-text no-margin">Eine Karte zurück</p>
            </button>
        </div>

        <!-- Nav -->
        <Nav />
    </div>
</template>


<script>
    export default {
        data() {
            return {
                title: "Karteikartenset",
                karteikartenset:{
                    name: "",
                    karteikarten: [],
                    id: this.$route.params.id,
                },
                category: {
                    name: "",
                },
                count: 0,
                lastCard: false,
                noCards: false,
                firstCard: true,
            }
        },
        mounted(){
            axios.get('/api/karteikartenset/' + this.karteikartenset.id)
            .then(response=>{
                this.karteikartenset.name = response.data.data[0].data.name;
                this.category.name = response.data.data[0].data.category_id.name;

            });
            axios.get('/api/karteikarten/' + this.karteikartenset.id)
            .then(response=>{
                this.karteikartenset.karteikarten = response.data;
                for(var i=0; i<this.karteikartenset.karteikarten.length; i++){
                    if(i === 0){
                        this.karteikartenset.karteikarten[i].showFront = true;
                    }else{
                        this.karteikartenset.karteikarten[i].showFront = false;
                    }
                    this.karteikartenset.karteikarten[i].showBack = false;
                }
                if(this.karteikartenset.karteikarten.length === 1){
                    this.lastCard = true;
                }
                if(this.karteikartenset.karteikarten.length === 0){
                    this.noCards = true;
                }
            });
        },
        methods: {
            spinCard(index){
                console.log(index);
                this.karteikartenset.karteikarten[index].showFront = !this.karteikartenset.karteikarten[index].showFront;
                this.karteikartenset.karteikarten[index].showBack = !this.karteikartenset.karteikarten[index].showBack;
                this.$forceUpdate();
            },
            nextCard(index){
                this.karteikartenset.karteikarten[index].showFront = false;
                this.karteikartenset.karteikarten[index].showBack = false;
                this.karteikartenset.karteikarten[index+1].showFront = true;
                this.count++;
                this.firstCard = false;
                if(this.karteikartenset.karteikarten.length === index+2){
                    this.lastCard = true;
                }
                this.$forceUpdate();
            },
            cardBack(index){
                this.karteikartenset.karteikarten[index].showFront = false;
                this.karteikartenset.karteikarten[index].showBack = false;
                this.karteikartenset.karteikarten[index-1].showFront = true;
                this.count--;
                this.lastCard = false;
                console.log(index);
                if(index-1 === 0){
                    this.firstCard = true;
                }
                this.$forceUpdate();
            },
        }
    }
</script>

<style scoped>
    .karteikarte-inhalt{
        text-align: center;
        font-size: 1.5em;
        margin: 10px;
    }

    .fragen-container--big{
        height: 350px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .turn-around{
        text-align: end;
        width: 100%;
    }

    .überspringen{
        text-align: center;
        font-style: italic;
        font-weight: lighter;
        font-size: 0.8em;
    }

    .schmaler{
        height: 35px;
    }

    .space-after{
        margin-bottom:20px;
    }


</style>
