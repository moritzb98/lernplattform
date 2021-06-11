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
        <div class="row mt-3">
            <div class="col">

                <div v-if="results.length > 0 && query">
                    Quiz
                     <div v-for="result in resultsQuizCategory.slice(0,10)" :key="result.id">
                       <a :href="result.url">
                            <div class="neumorph card-small card-small--border mb-2" :style="{ borderColor: result.searchable.category.color }">
                                <div v-text="result.title"></div>
                                <small class="ml-2" v-text="result.type"></small>
                            </div>
                        </a>
                     </div>

                    User
                     <div v-for="result in resultsUserCategory.slice(0,10)" :key="result.id">
                       <a :href="result.url">
                            <div class="neumorph card-small card-small--border mb-2">
                                <div v-text="result.title"></div>
                                <small class="ml-2" v-text="result.type"></small>
                            </div>
                        </a>
                     </div>

                    Sammlungen
                     <div v-for="result in resultsCollectionsCategory.slice(0,10)" :key="result.id">
                       <a :href="result.url">
                            <div class="neumorph card-small card-small--border mb-2">
                                <div v-text="result.title"></div>
                                <small class="ml-2" v-text="result.type"></small>
                            </div>
                        </a>
                     </div>

                    Lerngruppen
                     <div v-for="result in resultsRoomCategory.slice(0,10)" :key="result.id">
                       <a :href="result.url">
                            <div class="neumorph card-small card-small--border mb-2">
                                <div v-text="result.title"></div>
                                <small class="ml-2" v-text="result.type"></small>
                            </div>
                        </a>
                     </div>

                    Medien
                     <div v-for="result in resultsMediaCategory.slice(0,10)" :key="result.id">
                       <a :href="result.url">
                            <div class="neumorph card-small card-small--border mb-2">
                                <div v-text="result.title"></div>
                                <small class="ml-2" v-text="result.type"></small>
                            </div>
                        </a>
                     </div>

                    Karteikartensets (zeigt alles an aktuell)
                     <div v-for="result in resultsKarteikartensetCategory.slice(0,10)" :key="result.id">
                       <a :href="result.url">
                            <div class="neumorph card-small card-small--border mb-2">
                                <div v-text="result.title"></div>
                                <small class="ml-2" v-text="result.type"></small>
                            </div>
                        </a>
                     </div>
                </div>

                <div v-else>
                    <!-- Nothing found -->
                    Kategorien einblenden...
                </div>
            </div>
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
