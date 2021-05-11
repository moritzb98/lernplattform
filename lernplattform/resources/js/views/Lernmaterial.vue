<template>
    <div>
        <h1>Lernmaterial</h1>
        <a href="/spa/documents" class="button-link">
            <button class="mdc-button mdc-button--raised button--big">
                <span class="button-text">Meine Uploads</span> <span class="material-icons">chevron_right</span>
            </button>
        </a>

        <div class="container--flex">
            <router-link to="/spa/Sammlung-erstellen">
               <div class="mdc-card mdc-card--new button-link">
                    <span class="material-icons-outlined card-icons--new">add</span>
                    <p class="card-text--small">Sammlung erstellen</p>
                </div>
            </router-link>
            <div class="mdc-card mdc-card--middle">
                <span class="material-icons-outlined card-icons--big">biotech</span>
                <p class="card-text--small">Python</p>
            </div>
        </div>
        <div class="container--flex">
            <div class="mdc-card mdc-card--middle">
                <span class="material-icons-outlined card-icons--big">biotech</span>
                <p class="card-text--small">Abitur Bio</p>
            </div>
            <div class="mdc-card mdc-card--middle">
                <span class="material-icons-outlined card-icons--big">biotech</span>
                <p class="card-text--small">Lorem</p>
            </div>
        </div>
        <div class="container--flex">
            <div class="mdc-card mdc-card--middle">
                <span class="material-icons-outlined card-icons--big">biotech</span>
                <p class="card-text--small">Lorem</p>
            </div>
            <div class="mdc-card mdc-card--middle">
                <span class="material-icons-outlined card-icons--big">biotech</span>
                <p class="card-text--small">Lorem</p>
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
            axios.get('/api/upload/'+this.$route.params.id)
            .then(response=>{
                this.file = response.data;
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
