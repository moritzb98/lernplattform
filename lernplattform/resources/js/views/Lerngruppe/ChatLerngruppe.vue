<template>
    <div>
        <div class="row">
            <div class="col">
                <!-- Kategorie Banner  -->
                <div class="banner-grp-chat">
                    <div class="banner-grp-chat_body">
                        <div class="banner-grp-chat_body-title">
                            <h2>Gruppenname</h2>
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
                    <!-- <div class="chat_subcontrols">
                        <button class="neumorph chat_subcontrols-item">
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
                        </button>
                        <button class="neumorph chat_subcontrols-item">
                            <span class="material-icons">add</span>
                        </button>
                    </div> -->


                    <!-- Chat -->
                    <div class="chat">
                        <message-container :messages="messages" />
                    </div>

                    <!-- Nachrichten Optionen -->
                    <input-message
                        :room="currentRoom"
                        v-on:messagesent="getMessages()" />

                </div>
            </div>
        </div>
    </div>
</template>

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

    .chat_controls {
        display: flex;
        position: absolute;
        bottom: 0px;
        left: 0px;
        width: 100%;
        height: 40px;

        z-index: 1;

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
        right: 0;
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
                    console.log(this.response);
                    this.setRoom( response.data[0] );
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
                })
                .catch( error => {
                    console.log( error );
                })
            }
        },
        created() {
            this.getRooms();
       }

    }
</script>
