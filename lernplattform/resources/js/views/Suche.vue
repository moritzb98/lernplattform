<template>
    <div>
        <!-- Header -->
        <div class="header_wrapper">
            <div class="header">
                <div class="header_title">
                    {{title}}
                </div>
                <router-link to="/spa/Suche">
                    <span class="material-icons header_search">search</span>
                </router-link>
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
