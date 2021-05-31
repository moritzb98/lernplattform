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
        <a href="/spa/documents" class="button-link">
            <button class="mdc-button mdc-button--raised button--big">
                <span class="button-text">Meine Uploads</span> <span class="material-icons">chevron_right</span>
            </button>
        </a>

        <div class="container--flex">
            <router-link to='/spa/Sammlung-erstellen' >
               <div class="mdc-card mdc-card--new button-link">
                    <span class="material-icons-outlined card-icons--new">add</span>
                    <p class="card-text--small">Sammlung erstellen</p>
                </div>
            </router-link>
            <div class="mdc-card-container--45" v-for="collection in collections" :key="collection.id">
                <router-link :to='"/spa/Collection-detail/"+collection.id'>
                    <div class="router-text mdc-card mdc-card--middle mdc-card--100">
                        <span class="material-icons-outlined card-icons--big">biotech</span>
                        <p class="card-text--small">{{collection.name}}</p>
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
                collections:[],
                title: "Lernmaterial"
            }
        },
        mounted(){
            axios.get('/api/collection/show')
            .then(response=>{
                this.collections = response.data;
                console.log(response.data);
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


</style>
