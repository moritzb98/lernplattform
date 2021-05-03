<template>
    <div>
        <div class="row mb-3">
            <div class="col">
                <h1>Alle Lerngruppen</h1>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <button class="btn neumorph w-100">
                    <span class="btn_text mdc-button__label ">Lerngruppe finden</span>
                    <span class="btn_icon material-icons">people</span>
                </button>
            </div>
        </div>


        <!-- Filter: ID mit eingeloggter ID abgleichen -->
        <div class="row mb-3">
            <div class="col">
                <router-link to="/spa/Lerngruppe-erstellen">
                    <button class="btn neumorph w-100 mb-3">
                        <span class="btn_text mdc-button__label ">Lerngruppe erstellen</span>
                        <span class="btn_icon material-icons">people</span>
                    </button>
                </router-link>
                <div v-for="(room, index) in rooms" :key="index">
                    <!--<div class="neumorph card-grp mb-2">
                        {{room.name}}
                        <div class="card-grp_controls">
                            <div class="" @click="delete(room.id)">
                                X
                            </div>
                        </div>
                    </div>-->

                    <!-- delete funzt nicht  -->

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
            delete(id) {
                this.axios.post('http://127.0.0.1:8000/api/room/delete/' + id)
                    .then(response => (
                        console.log(response)
                    ))
            },
        },
        mounted(){
            this.getAllRooms()
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
        height: 100%;
        width: 40px;
        background-color: red;
        float: right;
        justify-content: flex-end;
        margin: 0 0 0 auto;
    }
</style>
