<template>
<!-- nicht genutzt aktuell -->
<div>
    <input type="text" placeholder="Suche nach einer Datei" v-model="query">
    <ul v-if="results.length > 0 && query">
    <li v-for="result in results.slice(0,10)" :key="result.id">
        <a :href="result.url">
            <div v-text="result.title"></div>
        </a>
    </li>
    </ul>
</div>
</template>

<script>
export default {
data(){
    return {
        query: null,
        results: []
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
