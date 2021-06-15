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

        <h5 v-if="noRooms" style="text-align: center; margin: 20px;" class="dashboard-headline">Keine Lerngruppen</h5>

        <div class="row justify-content-center mb-3">
            <div class="col-12">
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
                </div>
            </div>
        </div>

        <!-- Nav -->
        <Nav />
    </div>
</template>

<script>
    export default {
        data() {
            return {
                rooms:[],
                title: "Lerngruppe finden",
                noRooms: true,
            }
        },
        methods: {
            getAllRooms() {
                this.axios.get('/api/rooms')
                    .then(response=>{
                        for(var i = 0; response.data[0].length; i++){
                            if(response.data[0][i].user_id != response.data[1]){
                                this.rooms.push(response.data[0][i]);
                            }
                            if(this.rooms.length > 0){
                                this.noRooms = false;
                            }
                        }

                    })
            },
            joinRoom(roomid){
                this.axios.post('/api/room/join/' + roomid)
                    .then(response => {
                        //this.room.id = response.data.id,
                        console.log(response);
                        Vue.$toast.success('Lerngruppe erfolgreich beigetreten.', {});
                    }).catch(err => {
                        Vue.$toast.error('Du bist diesem Raum schon beigetreten.', {});
                    })
            },
        },
        mounted(){
            this.getAllRooms()
        }
    }
</script>

<style>




</style>
