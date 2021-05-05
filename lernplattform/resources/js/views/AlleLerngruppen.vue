<template>
    <div>
        <div class="row mb-3">
            <div class="col">
                <h1>Lerngruppe finden</h1>
            </div>
        </div>

        <div class="banner-grp-chat">
            <div class="banner-grp-chat_body">
                <div class="banner-grp-chat_body-title">
                    <h2>Kategorie</h2>
                </div>
            </div>
            <div class="banner-grp-chat_overlay"></div>
        </div>

        <!-- Page vorher: Kategorie wählen -->

        <!-- Filter, Sortierung  hinzufügen -->

        <div class="row justify-content-center mb-3" style="margin-top: -30px;">
            <div class="col-11">
                <div v-for="(room, index) in rooms" :key="index">
                    <div class="neumorph card-grp mb-2">
                        {{room.name}}
                        <div class="card-grp_controls">
                            <div class="card-grp_controls_item" @click="joinRoom(room.id)">
                                <span class="material-icons">login</span>
                            </div>
                            <!-- Anzeigen, wenn man Ersteller ist  -->
                            <div class="card-grp_controls_item" @click="updateRoom(room.id)">
                                <span class="material-icons">edit</span>
                            </div>
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
            getAllRooms() {
                this.axios.get('http://127.0.0.1:8000/api/rooms')
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
            this.getAllRooms()
        }
    }
</script>

<style>

    .banner-grp-chat {
        background-image: url("https://picsum.photos/200/300");
        background-color: #cccccc;
        width: 100%;
        height: 200px;

        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-bottom: 25px;
        padding: 0;
    }

    .banner-grp-chat_body {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        z-index: 1;
    }

    .banner-grp-chat_body-title {
        display: inline-block;
        margin: 0;
        margin-bottom: 20px;
        font-weight: 700;
        color: #fff;
        text-shadow: 0px 3px 5px #000;
    }

    .banner-grp-chat_overlay {
        width: 100%;
        height: 40px;
        border-radius: 40px 40px 0 0;
        background-color: #f1f1f1;

        position: absolute;
        bottom: 0;
        left: 0;
    }




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
