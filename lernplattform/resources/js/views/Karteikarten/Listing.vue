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
               <div class="mdc-card mdc-card--new button-link">
                    <span class="material-icons-outlined card-icons--new">add</span>
                    <p class="card-text--small"> erstellen</p>
                </div>
            </router-link>
            <div class="mdc-card-container--45">
                <router-link >
                    <div class="router-text mdc-card mdc-card--middle mdc-card--100">
                        <span class="material-icons-outlined card-icons--big">biotech</span>
                        <p class="card-text--small">Name</p>
                    </div>
                </router-link>
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
                title: "Karteikartensets"
            }
        },
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
