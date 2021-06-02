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

        <!-- Content  -->
        <div class="row">
            <div class="col">
                <!-- Kategorie Banner  -->
                <div class="banner-grp-chat">
                    <div class="banner-grp-chat_body">
                        <div class="banner-grp-chat_body-title">
                            <h2>{{currentRoom.name}}</h2>
                        </div>
                    </div>
                    <div class="banner-grp-chat_overlay"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <!-- Chat Container -->
                <div class="chat_container">

                    <!-- Obere Optionen -->
                    <div class="chat_subcontrols">
                        <router-link :to="konferenzLink">
                            <button class="neumorph chat_subcontrols-item">
                                <span class="material-icons">video_camera_front</span>
                            </button>
                        </router-link>
                        <!-- <button class="neumorph chat_subcontrols-item">
                            <span class="material-icons">add</span>
                        </button>
                        <button class="neumorph chat_subcontrols-item">
                            <span class="material-icons">add</span>
                        </button>
                        <button class="neumorph chat_subcontrols-item">
                            <span class="material-icons">add</span>
                        </button>
                        <button class="neumorph chat_subcontrols-item">
                            <span class="material-icons">add</span>
                        </button> -->
                    </div>


                    <!-- Chat Nachrichten -->
                    <message-container :messages="messages" />
                </div>
            </div>
        </div>

        <!-- Nachrichten Optionen -->
        <div class="chat_controls_container">
            <input-message
                :room="currentRoom"
                v-on:messagesent="getMessages()" />
        </div>

        <!-- Nav -->
        <Nav />
    </div>
</template>


<script>
    import MessageContainer from '../Chat/messageContainer.vue'
    import InputMessage from '../Chat/inputMessage.vue'
    import ChatRoomSelection from '../Chat/chatRoomSelection.vue'

    export default {
        components: {
            MessageContainer,
            InputMessage,
            ChatRoomSelection
        },
       data: function () {
            return {
                chatRooms: [],
                currentRoom: [],
                messages: [],
                urlId: this.$route.params.id,
                title: "Lerngruppe"
            }
        },
        watch: {
            currentRoom(){
                this.connect();
            }
        },
        methods: {
            connect() {
                if( this.currentRoom.id ){
                    let vm = this;
                    this.getMessages();
                    window.Echo.private("chat." + this.currentRoom.id )
                    .listen('.message.new', e => {
                        vm.getMessages();
                    })
                }
            },
            getRooms() {
                axios.get('/api/chat/rooms')
                .then( response => {
                    this.chatRooms = response.data;
                    console.log(response.data);
                    for (var i = 0; i < response.data.length; i++) {
                       if (response.data[i].id == this.urlId) {
                            this.setRoom( response.data[i] );
                       }
                    }
                })
                .catch( error => {
                    console.log( error );
                })
            },
            setRoom ( room ){
                this.currentRoom = room;
                this.getMessages();
            },
            getMessages(){
                axios.get('/api/chat/room/' + this.currentRoom.id + '/messages')
                .then( response => {
                    this.messages = response.data;
                    this.scroll();
                })
                .catch( error => {
                    console.log( error );
                })
            },
            scroll(){
                var el = document.querySelectorAll(".chat_message-wrapper:last-child")[0];
                if (el) {
                    el.scrollIntoView({behavior: 'smooth'});
                }
            }
        },
        created() {
            this.getRooms();
        },
        computed: { 
            konferenzLink() { 
                return this.$route.path + '/Konferenz'; 
            } 
        }
    }
</script>


<style>

    .chat_container {
        display: flex;
        position: relative;
        width: 100%;
        height: 70vh;
        padding: 15px 10px 40px 10px;
        justify-content: center;
        align-items: center;
        margin-top: -60px;
    }

    .chat {
        position: relative;
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        overflow: hidden;
        overflow-y: scroll;
    }

    .chat_controls_container {
        width: 100%;
        display: flex;
        position: absolute;
        bottom: 120px;
        left: 0px;
        z-index: 1;
    }

    .chat_controls {
        position: relative;
        display: flex;
        width: 90%;
        max-width: 500px;
        height: 40px;
        margin: 0 auto;
    }

    .chat_controls input {
        border: none;
        height: 40px;
    }


    .chat_controls-send {
        display: flex;
        align-items: center;
        position: absolute;
        top: -7px;
        right: 0px;
        border: none;
        padding: 15px;
    }

    .chat_subcontrols {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        position: absolute;
        top: 5px;
        right: 20px;
        width: 100%;
        height: 40px;

        z-index: 1;
    }

    .chat_subcontrols-item {
        display: flex;
        align-items: center;
        padding: 5px;
        border-radius: 12px;
        margin-left: 10px;
        border: none;
    }

    .chat_message-wrapper {
        display: flex;
        flex-direction: column;
        width: 100%;
        padding: 20px;
    }

    .chat_message {
        width: 80%;
    }

    .chat_message-autor {
        font-weight: 600;
    }

    .chat_message-timestamp {
        font-size: 10px;
        color: #777;
    }

    .chat_message--me {
        margin-left: auto;
    }

    .chat_message--others {
        margin-right: auto;
    }


</style>
