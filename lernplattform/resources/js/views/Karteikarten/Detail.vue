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
                    <div class="unterüberschrift-oberer-bereich">Frage 1/{{ karteikartenset.karteikarten.length }}</div>
                </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <div v-for="karteikarte in karteikartenset.karteikarten" :key="karteikarte.id" class="fragen-container fragen-container--big">
            <span class="material-icons-outlined turn-around">autorenew</span>
            <div class="karteikarte-inhalt">
                {{karteikarte.frontside}}
            </div>
            <div class="überspringen">
                Überspringen
            </div>
        </div>

        <button class="mdc-button mdc-button--raised button--big button--small abstand-weg button--border">
            <p class="button-text no-margin">Karte drehen</p>
            <span class="material-icons-outlined">autorenew</span>
        </button>
        <button class="mdc-button mdc-button--raised button--big button--small abstand-weg button--border">
            <p class="button-text no-margin">Nächste Karte</p>
            <span class="material-icons-outlined">chevron_right</span>
        </button>

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
            }
        },
        mounted(){
            axios.get('/api/karteikartenset/' + this.karteikartenset.id)
            .then(response=>{
                this.karteikartenset.name = response.data.data[0].data.name;
                this.category.name = response.data.data[0].data.category_id.name;
                console.log(response.data.data[0].data);
            });
            axios.get('/api/karteikarten/' + this.karteikartenset.id)
            .then(response=>{
                this.karteikartenset.karteikarten = response.data;
                console.log(response.data);
            });
        },
    }
</script>

<style scoped>
    .karteikarte-inhalt{
        text-align: center;
        font-size: 1.5em;
    }

    .fragen-container--big{
        /*height: 450px;*/
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .turn-around{
        text-align: end;
    }

    .überspringen{
        text-align: center;
        font-style: italic;
        font-weight: lighter;
        font-size: 0.8em;
    }


</style>
