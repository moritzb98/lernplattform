<template>
    <div>
        <div class="row mb-3">
            <div class="col">
                <h1>Meine Lerngruppen</h1>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <router-link to="/spa/Lerngruppe-finden">
                    <button class="btn neumorph w-100">
                        <span class="btn_text mdc-button__label ">Lerngruppe finden</span>
                        <span class="btn_icon material-icons">people</span>
                    </button>
                </router-link>
            </div>
        </div>


        <!-- Filter: ID mit eingeloggter ID abgleichen: Nur Rooms anzeigen, denen man beigetreten ist -->
        <div class="row mb-3">
            <div class="col">
                <router-link to="/spa/Lerngruppe-erstellen">
                    <button class="btn neumorph w-100 mb-3">
                        <span class="btn_text mdc-button__label ">Lerngruppe erstellen</span>
                        <span class="btn_icon material-icons">add</span>
                    </button>
                </router-link>
                <div v-for="(room, index) in rooms" :key="index">
                    <div class="neumorph card-grp mb-2">
                        {{room.name}}
                        <div class="card-grp_controls">
                            <router-link to="/spa/Lerngruppe-bearbeiten">
                                <div class="card-grp_controls_item">
                                    <span class="material-icons">edit</span>
                                </div>
                            </router-link>
                            <div class="card-grp_controls_item" @click="deleteRoom(room.id)">
                                <span class="material-icons">delete</span>
                            </div>
                        </div>
                    </div>
                    <!-- delete gibt 405 zurück --->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                rooms:[]
            }
        },
        methods: {
            getMyRooms() {
                this.axios.get('http://127.0.0.1:8000/api/getmyroom')
                    .then(response=>{
                        this.rooms=response.data
                    })
            },
            deleteRoom(id){
                this.axios.post('http://127.0.0.1:8000/api/room/delete/' + id)
                    .then(response => (
                        console.log(response)
                    ))
            }
        },
        mounted(){
            this.getMyRooms()
        }
    }
</script>

<style>
    .card-grp {
        display: flex;
        flex-direction: row;
        padding: 10px;
        border-radius: 30px;
    }
    .card-grp_controls {
        display: flex;
        height: 100%;
        justify-content: flex-end;
        align-items: center;
        margin: 0 0 0 auto;
    }

    .card-grp_controls_item {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        margin: 0 5px;
    }

    .card-grp_controls_item .material-icons {
        font-size: 22px;
        margin: 0;
    }



</style>
