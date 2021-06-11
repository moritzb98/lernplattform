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


        <div class="background-container">
            <div class="background">
                <span class="material-icons-outlined icon-für-oberen-Bereich">people</span>
                <div class="überschrift-oberer-Bereich" >Lerngruppe</div>
            </div>

            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <!-- Content -->
        <div class="content_wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="headline-text-field">Name der Lerngruppe</div>
                    <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                        <input maxlength="30" v-model="room.roomName" type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="headline-text-field">Maximale Personenzahl</div>
                    <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                        <input v-model="room.roomMaxPersons" type="number" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
                    </label>
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
                    this.axios.post('/api/room/create', room)
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
