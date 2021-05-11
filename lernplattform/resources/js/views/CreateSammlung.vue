<template>
    <div>
        <h1>Sammlung erstellen</h1>
        <div class="headline-text-field">Name der Sammlung</div>
        <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
            <input v-model="collection.name" type="text" class="mdc-text-field__input text-field__input--modified" placeholder="" aria-label="Label">
        </label>
        <router-link to="/spa/Lernmaterial">
            <div class="list-items button-link">
                <div class="list-items-text">Abbrechen</div>
                <span class="material-icons">add</span>
            </div>
        </router-link>
        <div @click="createCollection()" class="list-items">
            <div class="list-items-text">Erstellen</div>
            <span class="material-icons">add</span>
        </div>

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
