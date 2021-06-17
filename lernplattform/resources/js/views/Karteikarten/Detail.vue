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
            <div :style="{ backgroundColor: category.colorBackground }" class="background">
                <span :style="{ color: category.colorIcon }" class="material-icons-outlined icon-für-oberen-Bereich">{{category.icon}}</span>
                <div :style="{ color: category.color }" class="überschrift-oberer-Bereich" >
                     {{ category.name }}
                    <div :style="{ color: category.colorText }" class="unterüberschrift-oberer-bereich">Karteikarte {{ count +1 }}/{{ karteikartenset.karteikarten.length }}</div>
                </div>
            </div>
            <div :style="{ backgroundColor: category.colorBackground }" class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <div v-for="(karteikarte, index) in karteikartenset.karteikarten" :key="karteikarte.id" class="card-container">
            <div class="card" :class="{flipped: karteikarte.showBack, visible: karteikarte.showFront || karteikarte.showBack}">
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
            </div>
            <button :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white, '+ category.color + ')' }" v-if="!lastCard && count === index" @click="nextCard(index)" class="mdc-button mdc-button--raised button--big button--small abstand-weg button--border schmaler space-after">
                <p class="button-text no-margin">Nächste Karte</p>
                <span class="material-icons-outlined">chevron_right</span>
            </button>

            <button :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white, '+ category.color + ')' }" v-if="!firstCard && count === index" @click="cardBack(index)" class="mdc-button mdc-button--raised button--big button--small abstand-weg button--border schmaler">
                <span class="material-icons-outlined">chevron_left</span>
                <p class="button-text no-margin">Eine Karte zurück</p>
            </button>
        </div>
        <br><br><br><br><br><br><br>
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
                    color: "",
                    colorBackground: "",
                    colorIcon: "",
                    colorText: "",
                    icon: "",
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
                this.category.color = response.data.data[0].data.category_id.color;
                this.category.colorBackground = this.hexToRgbA(this.category.color,0.4);
                this.category.colorIcon = this.hexToRgbA(this.category.color,0.5);
                this.category.colorText = this.hexToRgbA(this.category.color,0.7);
                this.category.icon = response.data.data[0].data.category_id.icon;
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
            spinCard(index){
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

    .card{
        transition: transform 1s;
        transform-style: preserve-3d;
        cursor: pointer;
        position: relative;
        background: none;
        display: none;
    }

    .card-container{
        margin-top: -30px;
    }

    .visible{
        display: block;
    }

    .card.flipped {
        transform: rotateY(360deg);
    }

    .fragen-container--big{
        height: 350px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card__face {
        position: absolute;
        width: 100%;
        height: 100%;
        line-height: 260px;
        color: white;
        text-align: center;
        font-weight: bold;
        font-size: 40px;
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
