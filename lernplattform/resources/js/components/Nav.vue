<template>
    <div>
        <!-- Navigation -->
        <!-- Active Klasse Navigationspunkt filled <-> outline  -->
        <div class="nav_wrapper">
            <div class="nav">
                <router-link to="/spa/Dashboard">
                    <div class="nav_item neumorph">
                        <span class="material-icons">dashboard</span>
                    </div>
                </router-link>
                <router-link to="/spa/Lernmaterial">
                    <div class="nav_item neumorph">
                        <span class="material-icons">school</span>
                    </div>
                </router-link>
                <router-link to="#">
                    <div class="nav_item neumorph" v-on:click="showNavDropUp">
                        <span class="material-icons">add</span>
                    </div>
                </router-link>
                <router-link to="/spa/Lerngruppen/Eigene">
                    <div class="nav_item neumorph">
                        <span class="material-icons">people</span>
                    </div>
                </router-link>
                <router-link to="/spa/quizkategorie">
                    <div class="nav_item neumorph">
                        <span class="material-icons">quiz</span>
                    </div>
                </router-link>

                <!-- Navigation Drop Up-->
                <div id="js__nav_drop-up" class="nav_drop-up_wrapper">
                    <div class="nav_drop-up neumorph">
                        <div class="container">
                            <div class="row">
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Sammlung-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <span class="material-icons-outlined card_img">source</span>
                                            <div class="card_title">Sammlung</div>
                                        </div>
                                    </router-link>
                                </div>
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Karteikartenset/Erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <span class="material-icons-outlined card_img">description</span>
                                            <div class="card_title">Karteikarten</div>
                                        </div>
                                    </router-link>
                                </div>
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/upload">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <span class="material-icons-outlined card_img">perm_media</span>
                                            <div class="card_title">Medien hochladen</div>
                                        </div>
                                    </router-link>
                                </div>
                                <!-- <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Kurs-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <img class="card_img" src="" alt="" />
                                            <div class="card_title">Kurs</div>
                                        </div>
                                    </router-link>
                                </div> -->
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Quiz-erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <span class="material-icons-outlined card_img">quiz</span>
                                            <div class="card_title">Quiz</div>
                                        </div>
                                    </router-link>
                                </div>
                                <div class="col col-6 col-sm-4 mt-3">
                                    <router-link to="/spa/Lerngruppen/Erstellen">
                                        <div class="card neumorph" v-on:click="showNavDropUp">
                                            <span class="material-icons-outlined card_img">people</span>
                                            <div class="card_title">Lerngruppe</div>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Nav',
        data() {
            return {
            };
        },
        methods: {
            showNavDropUp: function() {
                var e = document.getElementById("js__nav_drop-up");
                e.classList.toggle("nav_drop-up--active");
            }
        }
    }

</script>
