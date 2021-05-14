<template>
    <div>
        <!-- Header -->
        <div class="header_wrapper">
            <div class="header">
                <div class="header_title">
                    {{title}}
                </div>
                <router-link to="/spa/Suche">
                    <span class="material-icons header_search">search</span>
                </router-link>
            </div>
        </div>

        <!-- Content -->

        <!-- Kategorie Banner  -->
        <!-- <div class="banner-grp-chat">
            <div class="banner-grp-chat_body">
                <div class="banner-grp-chat_body-title">
                    <h2>Kategorie</h2>
                </div>
            </div>
            <div class="banner-grp-chat_overlay"></div>
        </div> -->


        <!-- Page vorher: Kategorie wählen -->

        <!-- Filter, Sortierung  hinzufügen -->

        <!-- Mit darunter austauschen, wenn Kategoriebanner eingefügt -->
        <!-- <div class="row justify-content-center mb-3" style="margin-top: -30px;"> -->

        <div class="row justify-content-center mb-3">
            <div class="col-11">
                <div v-for="(room, index) in rooms" :key="index">
                    <div class="neumorph card-small mb-2">
                        {{room.name}}
                        <div class="card-small_controls">
                            <div class="card-small_controls_item" @click="joinRoom(room.id)">
                                <span class="material-icons">login</span>
                            </div>
                            <!-- Anzeigen, wenn man Ersteller ist  -->
                            <!-- <div class="card-small_controls_item" @click="updateRoom(room.id)">
                                <span class="material-icons">edit</span>
                            </div>
                            <div class="card-small_controls_item" @click="deleteRoom(room.id)">
                                <span class="material-icons">delete</span>
                            </div> -->
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
                rooms:[],
                title: "Lerngruppe finden"
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




</style>
