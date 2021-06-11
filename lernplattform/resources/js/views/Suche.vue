<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    {{title}}
                </div>
            </div>
        </div>

        <!-- Search Input -->
        <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
            <input
                class="mdc-text-field__input text-field__input--modified"
                type="text"
                placeholder="Suche nach einer Datei"
                v-model="query">
        </label>

        <!-- Ergebnis Listing -->
        <div v-if="results.length > 0 && query" style="padding-bottom: 120px;">

            <!-- Quiz Ergebnis -->
            <div v-if="resultsQuizCategory.length > 0">
                <div class="row mt-3">
                    <div class="col">
                        <div class=" search-grp-divider w-100 d-flex mt-2 ">
                            <p>Quiz</p> <span></span>
                        </div>
                        <div v-for="result in resultsQuizCategory.slice(0,10)" :key="result.id">
                            <router-link :to="result.url">
                                <div class="kategorie-container search-overwrite mb-2">
                                    <div class="kategorie-icon-container">
                                        <span :style="{ color: result.searchable.category.color }" class="material-icons-outlined quiz-kategorie-icon">{{result.searchable.category.icon}}</span>
                                    </div>
                                    <div :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white, '+ result.searchable.category.color  + ')' }" class="quiz-kategorie-container">
                                        <div v-text="result.title"></div>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Ergebnis  -->
            <div v-if="resultsUserCategory.length > 0">
                <div class="row mt-3">
                    <div class="col">
                        <div class=" search-grp-divider w-100 d-flex mt-2 ">
                            <p>User</p> <span></span>
                        </div>
                        <div v-for="result in resultsUserCategory.slice(0,10)" :key="result.id">
                            <router-link :to="result.url">
                                <div class="kategorie-container search-overwrite mb-2">
                                    <div class="kategorie-icon-container">
                                        <span style="color: black;" class="material-icons-outlined quiz-kategorie-icon">person</span>
                                    </div>
                                    <div :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white,black)' }" class="quiz-kategorie-container">
                                        <div v-text="result.title"></div>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sammlungen Ergebnis  -->
            <div v-if="resultsCollectionsCategory.length > 0">
                <div class="row mt-3">
                    <div class="col">
                        <div class=" search-grp-divider w-100 d-flex mt-2 ">
                            <p>Sammlungen</p> <span></span>
                        </div>
                        <div v-for="result in resultsCollectionsCategory.slice(0,10)" :key="result.id">
                            <router-link :to="result.url">
                                <div class="kategorie-container search-overwrite mb-2">
                                    <div class="kategorie-icon-container">
                                        <span :style="{ color: result.searchable.category.color }" class="material-icons-outlined quiz-kategorie-icon">{{result.searchable.category.icon}}</span>
                                    </div>
                                    <div :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white, '+ result.searchable.category.color  + ')' }" class="quiz-kategorie-container">
                                        <div v-text="result.title"></div>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lerngruppen Ergebnis  -->
            <div v-if="resultsRoomCategory.length > 0">
                <div class="row mt-3">
                    <div class="col">
                        <div class=" search-grp-divider w-100 d-flex mt-2 ">
                            <p>Lerngruppen</p> <span></span>
                        </div>
                        <div v-for="result in resultsRoomCategory.slice(0,10)" :key="result.id">
                            <router-link :to="result.url">
                                <div class="kategorie-container search-overwrite mb-2">
                                    <div class="kategorie-icon-container">
                                        <span :style="{ color: result.searchable.category.color }" class="material-icons-outlined quiz-kategorie-icon">{{result.searchable.category.icon}}</span>
                                    </div>
                                    <div :style="{ backgroundImage: 'radial-gradient(white, white), radial-gradient(circle at top left,white, '+ result.searchable.category.color  + ')' }" class="quiz-kategorie-container">
                                        <div v-text="result.title"></div>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Karteikartensets Ergebnis  -->
            <div v-if="resultsKarteikartensetCategory.length > 0">
                <div class="row mt-3">
                    <div class="col">
                        <div class=" search-grp-divider w-100 d-flex mt-2 ">
                            <p>Karteikartensets</p> <span></span>
                        </div>
                        <div v-for="result in resultsKarteikartensetCategory.slice(0,10)" :key="result.id">
                        <a :href="result.url">
                                <div class="neumorph card-small card-small--border mb-2">
                                    <div v-text="result.title"></div>
                                    <small class="ml-2" v-text="result.type"></small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Einfügen, sobald Uploads funzen -->

            <!-- Medine (Dateien, Uploads) Ergebnis  -->
            <!-- <div v-if="resultsMediaCategory.length > 0">
                <div class="row mt-3">
                    <div class="col">
                        <div class=" search-grp-divider w-100 d-flex mt-2 ">
                            <p>Medien</p> <span></span>
                        </div>
                        <div v-for="result in resultsMediaCategory.slice(0,10)" :key="result.id">
                        <a :href="result.url">
                                <div class="neumorph card-small card-small--border mb-2">
                                    <div v-text="result.title"></div>
                                    <small class="ml-2" v-text="result.type"></small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

        <div v-else>
            <!-- Nothing found -->
        </div>




        <!-- Nav -->
        <Nav />

    </div>
</template>

<script>
    export default {
        data(){
            return {
                query: null,
                results: [],
                title: "Suche"
            };
        },
        watch: {
            query(after, before){
                this.searchUploads();
            }
        },
        computed: {
            resultsQuizCategory: function () {
                return this.results.filter((result) => {
                    return result.type.match("quiz")
                });
            },
            resultsUserCategory: function () {
                return this.results.filter((result) => {
                    return result.type.match("users")
                });
            },
            resultsRoomCategory: function () {
                return this.results.filter((result) => {
                    return result.type.match("rooms")
                });
            },
            resultsKarteikartensetCategory: function () {
                return this.results.filter((result) => {
                    return result.type.match("karteikartenset")
                });
            },
            resultsCollectionsCategory: function () {
                return this.results.filter((result) => {
                    return result.type.match("collections")
                });
            },
            resultsMediaCategory: function () {
                return this.results.filter((result) => {
                    return result.type.match("")
                });
            }
        },
        methods:{
            searchUploads(){
                axios.get('/api/search/upload', {params: {query:this.query}}).then(response=>{
                    this.results = response.data,
                console.log(response)
                })
                .catch(error=>{});
            }
        }
    }
</script>

<style>

    .search-overwrite {

    }

    .search-overwrite .kategorie-icon-container {
        width: 50px;
        height: 50px;
    }

    .search-overwrite .quiz-kategorie-icon {
        font-size: 2.4em;
    }

    .search-overwrite .quiz-kategorie-container {
        height: 40px;
    }

    .search-grp-divider {
        margin-top: 40px;
    }

    .search-grp-divider p {
        display: inline; margin-right: 15px; font-weight: 500; color: #777;
    }
    .search-grp-divider span {
        display: inline-block; width: 100%; border-top: 2px solid #ddd; transform: translateY(8px);
    }

</style>
