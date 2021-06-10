<template>
    <div>
        <!-- Header [Search] -->
        <div class="header_wrapper">
            <div class="header header--search">
                <div class="header_title">
                    {{title}}
                </div>
                <router-link to="/spa/Suche">
                    <span class="material-icons neumorph header_search">search</span>
                </router-link>
            </div>
        </div>

        <!-- Content  -->
        <div class="container--flex">
            <router-link to='/spa/Karteikartenset/Erstellen' >
               <div class="mdc-card mdc-card--new button-link card-karteikarten">
                    <span class="material-icons-outlined card-icons--new">add</span>
                    <p class="card-text--small"> Karteikartenset erstellen</p>
                </div>
            </router-link>
            <div class="mdc-card-container--45" v-for="karteikartenset in karteikartensets" :key="karteikartenset.data.id">
                <router-link :to='"/spa/Karteikartenset/"+ karteikartenset.data.id'>
                    <div :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white, '+ karteikartenset.data.category_id.color  + ')' }"  class="router-text mdc-card mdc-card--middle mdc-card--100">
                        <span :style="{ color: karteikartenset.data.category_id.color }" class="material-icons-outlined card-icons--big">{{karteikartenset.data.category_id.icon}}</span>
                        <p class="card-text--small">{{karteikartenset.data.name}}</p>
                    </div>
                </router-link>
            </div>
        </div>
        <br><br><br><br><br>
        <!-- Nav -->
        <Nav />

    </div>
</template>

<script>
    export default {
        data() {
            return {
                karteikartensets:[],
                title: "Karteikartensets"
            }
        },
        mounted(){
            axios.get('/api/karteikartensets')
            .then(response=>{
                this.karteikartensets = response.data.data;
                console.log(response.data.data);
            });

        },
        methods: {

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

    .card-karteikarten{
        max-width: 157px;
    }



</style>
