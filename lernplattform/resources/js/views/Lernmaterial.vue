<template>
    <div>
        <h1>Lernmaterial</h1>
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
                <div class="mdc-card mdc-card--middle mdc-card--100">
                    <span class="material-icons-outlined card-icons--big">biotech</span>
                    <p class="card-text--small">{{collection.name}}</p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                collections:[],
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
