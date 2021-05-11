<template>
    <div>
        <h1>Sammlung erstellen</h1>
    </div>
</template>



<script>
    export default {
        data() {
            return {
                collection:{
                    name:"",
                },
            }
        },

        methods: {
            createCollection(){
                axios.post('/api/collection/create',this.collection)
                .then(response=>{
                    console.log(response.data);
                    Vue.$toast.success('Sammlung erfolgreich erstellt.', {});
                    this.$router.push({ path: '/spa/Lernmaterial' });
                });
            }
        }
    }
</script>
