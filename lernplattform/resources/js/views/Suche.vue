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
                        <a :href="result.url">
                            <div class="neumorph card-small mb-2">
                                <div v-text="result.title"></div>
                            </div>
                        </a>
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
