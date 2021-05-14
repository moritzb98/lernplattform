<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <router-link to="/spa/Suche">
                    <span class="material-icons neumorph header_back">arrow_back</span>
                </router-link>
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
                            <h2>Bearbeiten</h2>
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

        <div class="row mb-3">
            <div class="col-12">
                <button class="btn neumorph w-100" @click="updateRoom()">
                    <span class="btn_text mdc-button__label ">Einstellungen speichern</span>
                </button>
            </div>
        </div>
    </div>
</template>

<style>
</style>

<script>
    export default {
        data() {
            return {
                room: {
                    //notwendig?
                    id: '',
                    roomName: '',
                    roomMaxPersons: null,
                },
                title: "Lerngruppe"
            }
        },
        mounted() {
            this.room.id = this.$route.params.id;

            this.axios.post('http://127.0.0.1:8000/api/room/get/' + this.room.id)
            .then(response => (
                this.room.roomName = response.data.name,
                this.room.roomMaxPersons = response.data.maxPersons
            ))

        },
        methods: {
            updateRoom(){
                this.axios.post('http://127.0.0.1:8000/api/room/update/', this.room)
                    .then(response => (
                        console.log(response)
                    ))
            }
        }
    }
</script>
