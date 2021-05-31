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
        <!-- <div class="row mb-5">
            <div class="col-12">
                <router-link to="/spa/Kartenset/Erstellen">
                    <button class="btn neumorph w-100">
                        <span class="btn_text mdc-button__label ">Kartensets finden</span>
                        <span class="btn_icon material-icons">view_carousel</span>
                    </button>
                </router-link>
            </div>
        </div> -->


        <div class="row mb-3">
            <div class="col">
                <router-link to='/spa/Karteikartenset/Erstellen' >
                    <div class="mdc-card mdc-card--new button-link">
                        <span class="material-icons-outlined card-icons--new">add</span>
                        <p class="card-text--small">Kartenset erstellen</p>
                    </div>
                </router-link>
            </div>
        </div>
        </div>
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
