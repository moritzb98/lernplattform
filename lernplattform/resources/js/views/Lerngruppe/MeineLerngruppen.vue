<template>
    <div>
        <!-- Header [Search] -->
        <div class="header_wrapper">
            <div class="header header--search">
                <div class="header_title">
                    {{title}}
                </div>
                <router-link to="/spa/Suche">
                    <span class="material-icons neumorph header_search">search</span>
                </router-link>
            </div>
        </div>

        <!-- Content  -->
        <div class="row mb-3">
            <div class="col-12">
                <router-link to="/spa/Lerngruppen/Finden">
                    <button class="btn neumorph w-100">
                        <span class="btn_text mdc-button__label ">Lerngruppe finden</span>
                        <span class="btn_icon material-icons">people</span>
                    </button>
                </router-link>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col">
                <router-link to="/spa/Lerngruppen/Erstellen">
                    <button class="btn neumorph btn--dashed w-100 mb-4">
                        <span class="btn_text mdc-button__label ">Lerngruppe erstellen</span>
                        <span class="btn_icon material-icons">add</span>
                    </button>
                </router-link>
                <h5 class="dashboard-headline">Meine Lerngruppen</h5>
                <div v-if="!noMyRooms" v-for="(room, index) in rooms" :key="index">
                        <div class="neumorph card-small mb-2">
                            {{room.data.name}}
                            <div class="card-small_controls" >

                                <!-- CTA Zum Chat -->
                                <router-link :to='"/spa/Lerngruppen/"+room.data.id+"/Chat"'>
                                    <div class="card-small_controls_item">
                                        <span class="material-icons">question_answer</span>
                                    </div>
                                </router-link>

                                <!-- Optionen Menü -->
                                <md-menu md-size="small">
                                    <md-button md-menu-trigger class="card-small_dropdown-btn">
                                        <span class="material-icons">more_vert</span>
                                    </md-button>

                                    <md-menu-content class="card-small_dropdown">
                                        <md-menu-item>
                                            <div class="card-small_controls_item" @click="leaveRoom(room.data.id)">
                                                <span class="material-icons">logout</span> Verlassen
                                            </div>
                                        </md-menu-item>
                                        <md-menu-item>
                                            <router-link :to='"/spa/Lerngruppen/"+room.data.id+"/Bearbeiten"'>
                                                <div class="card-small_controls_item">
                                                    <span class="material-icons">edit</span> Bearbeiten
                                                </div>
                                            </router-link>
                                        </md-menu-item>
                                        <md-menu-item>
                                            <div class="card-small_controls_item" @click="deleteRoom(room.data.id)">
                                                <span class="material-icons">delete</span> Löschen
                                            </div>
                                        </md-menu-item>
                                    </md-menu-content>
                                </md-menu>

                            </div>
                        </div>
                </div>
                <div v-if="noMyRooms">Noch keinen Raum erstellt.</div>
                <hr>
                <h5 class="dashboard-headline">Beigetretene Lerngruppen</h5>
                <div v-if="!noOtherRooms" v-for="(roomUserIsIn, index) in roomsUserIsIn" :key="index">
                    <div class="neumorph card-small mb-2">

                        {{roomUserIsIn.data.room_id.name}}
                        <div class="card-small_controls" >

                            <!-- CTA Zum Chat -->
                            <router-link :to='"/spa/Lerngruppen/"+roomUserIsIn.data.room_id.id+"/Chat"'>
                                <div class="card-small_controls_item">
                                    <span class="material-icons">question_answer</span>
                                </div>
                            </router-link>

                            <!-- Optionen Menü -->
                            <md-menu md-size="small">
                                <md-button md-menu-trigger class="card-small_dropdown-btn">
                                    <span class="material-icons">more_vert</span>
                                </md-button>

                                <md-menu-content class="card-small_dropdown">
                                    <md-menu-item>
                                        <div class="card-small_controls_item" @click="leaveRoom(roomUserIsIn.data.room_id.id)">
                                            <span class="material-icons">logout</span> Verlassen
                                        </div>
                                    </md-menu-item>
                                </md-menu-content>
                            </md-menu>

                        </div>
                    </div>
                </div>
                <div v-if="noOtherRooms">Noch keinem Raum beigetreten.</div>
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
                roomsUserIsIn: [],
                title: "Meine Lerngruppen",
                noMyRooms: true,
                noOtherRooms: true,
            }
        },
        methods: {
            getMyRooms() {
                this.axios.get('/api/getmyroom')
                    .then(response=>{
                        this.rooms=response.data.data;
                        if(this.rooms.length > 0){
                            this.noMyRooms = false;
                        }
                    })
            },
            getRoomsUserIsIn() {
                this.axios.get('/api/room/userIsIn')
                    .then(response=>{
                        this.roomsUserIsIn=response.data.data,
                        console.log(this.roomsUserIsIn);
                        // console.log("test" ,response.data.data);
                        if(this.roomsUserIsIn.length > 0){
                            this.noOtherRooms = false;
                        }
                    })
            },
            deleteRoom(id){
                this.axios.post('/api/room/delete/' + id)
                    .then(response => {
                        console.log(response);
                        Vue.$toast.success('Lerngruppe erfolgreich gelöscht.', {});
                        this.$router.go();
                    })
            },
            leaveRoom(roomid){
                this.axios.post('/api/room/leave/' + roomid)
                    .then(response => {
                        console.log(response);
                        Vue.$toast.success('Lerngruppe erfolgreich verlassen.', {});
                        this.$router.go();
                    }).catch(err => {
                        Vue.$toast.info(err.response.data.error, {});
                    })

            },
        },
        mounted(){
            this.getMyRooms()
            this.getRoomsUserIsIn()
        },
    }
</script>

<style>


</style>
