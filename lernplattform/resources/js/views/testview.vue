<template>
    <div>
        <hr>
        <h1>Raum erstellen</h1>
        <input type="text" v-model="room.roomName"> {{ room.roomName }}
        <br>
        <input type="number" v-model="room.roomMaxPersons"> {{ room.roomMaxPersons }}
        <p @click="createRoom(room)">Raum erstellen</p>
    </div>
</template>

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
                this.axios.post('http://localhost:8000/api/room/create', room)
                    .then(response => (
                        console.log(response)
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false);
            }
        }
    }
</script>
