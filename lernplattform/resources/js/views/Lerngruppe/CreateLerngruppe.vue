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

        <!-- Content -->
        <div class="row mb-5">
            <div class="col">
                <div class="banner neumorph">
                    <div class="banner_body">
                        <div class="banner_body-img">
                            <span class="material-icons">people</span>
                        </div>
                        <div class="banner_body-title">
                            <h2>Gruppe</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 mb-4">
                <label>Name</label>
                <input class="neumorph--pressed neumorph--pressed--border input w-100" type="text" v-model="room.roomName">
            </div>
            <div class="col-12 mb-2">
                <label>Maximale Personenzahl</label>
                <input class="neumorph--pressed neumorph--pressed--border input w-100" type="number" v-model="room.roomMaxPersons">
            </div>

        </div>
        <!-- Select -->
            <div class="headline-text-field">Kategorie wählen</div>
            <select class="mdc-button mdc-button--raised button--big dropdown" name="categories" v-model="room.category_id">
                <option selected="selected" value="">Bitte wähle eine Kategorie aus</option>
                <option v-for="categorie in categories" :key="categorie.name" :value="categorie.id">
                    {{categorie.name}}
                </option>
            </select>

            <!-- Select End -->
            <br><br><br>
        <div class="row mb-3">
            <div class="col-12">
                <button class="btn neumorph w-100" @click="createRoom(room)">
                    <span class="btn_text mdc-button__label ">Lerngruppe erstellen</span>
                    <span class="btn_icon material-icons">people</span>
                </button>
            </div>
        </div>

        <!-- Nav -->
        <Nav />
    </div>
</template>

<style>
</style>

<script>
    export default {
        data() {
            return {
                room: {
                    roomName: '',
                    roomMaxPersons: null,
                    category_id: null,
                },
                title: "Erstellen",
                categories: [],
            }
        },
        mounted() {
            axios.get('/api/categories')
                .then(response=>{
                    this.categories = response.data;
                });
        },
        methods: {
            createRoom(room) {
                if(this.room.category_id != null){
                    this.axios.post('http://127.0.0.1:8000/api/room/create', room)
                        .then(response => (
                            Vue.$toast.success('Lerngruppe erfolgreich erstellt', {}),
                            this.$router.push({ path: '/spa/Lerngruppen/Eigene' })
                        ))
                        .catch(err => Vue.$toast.error('Beim Erstellen ist etwas schief gegangen :(', {}))
                        .finally(() => this.loading = false);
                }else{
                    Vue.$toast.error('Keine Kategorie ausgewählt.', {});
                }
            }
        }
    }
</script>


