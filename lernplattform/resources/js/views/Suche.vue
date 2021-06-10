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
                    <div v-for="result in results.slice(0,10)" :key="result.id">
                        <!-- <a :href="result.url">
                            <div class="neumorph card-small card-small--border mb-2">
                                <div v-text="result.title"></div>
                            </div>
                        </a> -->

                        <div v-if="result.searchable.category != 0">
                            <div class="mdc-card mdc-card-lernmaterial mb-2" :style="{ color: result.searchable.category.color }">
                                <div class="card-lernmaterial-spacing">
                                    <div class="card-lernmaterial-icon-container">
                                        <span class="material-icons material-icons-lernmaterial">school</span>
                                    </div>
                                    <div class="card-lernmaterial-middle-column-container">
                                        <div class="mdc-chip-container">
                                            <div class="mdc-chip mdc-chip--red mdc-chip-lernmaterial" role="row">
                                                <span class="mdc-chip__text" v-text="result.type"></span>
                                            </div>
                                        </div>
                                        <div class="card-lernmaterial-headline" v-text="result.title"></div>
                                    </div>
                                    <div>
                                        <div class="card-lernmaterial-date-icon-container">
                                                <span class="material-icons-outlined">visibility</span>
                                                <span class="material-icons-outlined">file_download</span>
                                                <span class="material-icons-outlined">send</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <div class="mdc-card mdc-card-lernmaterial mb-2" >
                                <div class="card-lernmaterial-spacing">
                                    <div class="card-lernmaterial-icon-container">
                                        <span class="material-icons material-icons-lernmaterial">school</span>
                                    </div>
                                    <div class="card-lernmaterial-middle-column-container">
                                        <div class="mdc-chip-container">
                                            <div class="mdc-chip mdc-chip--red mdc-chip-lernmaterial" role="row">
                                                <span class="mdc-chip__text" v-text="result.type"></span>
                                            </div>
                                        </div>
                                        <div class="card-lernmaterial-headline" v-text="result.title"></div>
                                    </div>
                                    <div>
                                        <div class="card-lernmaterial-date-icon-container">
                                                <span class="material-icons-outlined">visibility</span>
                                                <span class="material-icons-outlined">file_download</span>
                                                <span class="material-icons-outlined">send</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div v-else>
                    <!-- Nothing found -->
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
