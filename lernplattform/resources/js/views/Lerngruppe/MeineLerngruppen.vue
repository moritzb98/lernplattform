<template>
    <div>
        <div class="row mb-3">
            <div class="col">
                <h1>Meine Lerngruppen</h1>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <router-link to="/spa/Lerngruppen/Finden">
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
                <router-link to="/spa/Lerngruppen/Erstellen">
                    <button class="btn neumorph btn--dashed w-100 mb-3">
                        <span class="btn_text mdc-button__label ">Lerngruppe erstellen</span>
                        <span class="btn_icon material-icons">add</span>
                    </button>
                </router-link>
                <div v-for="(room, index) in rooms" :key="index">
                    <!-- <router-link :to='"/spa/Lerngruppen/"+room.id+"/Chat"'> -->
                        <div class="neumorph card-small mb-2">
                            {{room.name}}
                            <div class="card-small_controls" >

                                <!-- CTA Zum Chat -->
                                <router-link :to='"/spa/Lerngruppen/"+room.id+"/Chat"'>
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
                                            <div class="card-small_controls_item" @click="deleteRoom(room.id)">
                                                <span class="material-icons">logout</span> Verlassen
                                            </div>
                                        </md-menu-item>
                                        <md-menu-item>
                                            <router-link :to='"/spa/Lerngruppen/"+room.id+"/Bearbeiten"'>
                                                <div class="card-small_controls_item">
                                                    <span class="material-icons">edit</span> Bearbeiten
                                                </div>
                                            </router-link>
                                        </md-menu-item>
                                        <md-menu-item>
                                            <!-- delete gibt 405 zurück --->
                                            <div class="card-small_controls_item" @click="deleteRoom(room.id)">
                                                <span class="material-icons">delete</span> Löschen
                                            </div>
                                        </md-menu-item>
                                    </md-menu-content>
                                </md-menu>

                            </div>
                        </div>
                    <!-- </router-link> -->
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


</style>
