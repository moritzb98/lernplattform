<template>
    <div>
        <div class="row mb-5">
            <div class="col">
                <div class="banner neumorph">
                    <div class="banner_body">
                        <div class="banner_body-img">
                            <span class="material-icons">people</span>
                        </div>
                        <div class="banner_body-title">
                            <h2>Lerngruppe bearbeiten</h2>
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
                <button class="btn neumorph w-100" @click="updateRoom(room)">
                    <span class="btn_text mdc-button__label ">Lerngruppe erstellen</span>
                    <span class="btn_icon material-icons">people</span>
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
                    roomName: '',
                    roomMaxPersons: null,
                }

            }
        },
        methods: {
            createRoom(room) {
                this.axios.post('http://127.0.0.1:8000/api/room/update', room)
                    .then(response => (
                        console.log(response)
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false);
            }
        }
    }
</script>
