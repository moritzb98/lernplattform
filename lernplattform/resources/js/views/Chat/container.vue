<template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto xm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <message-container />
                    <input-message
                        :room="currentRoom"
                        v-on:messagesent="getMessages()" />



                </div>
                <button @click="test">tets</button>
            </div>
        </div>

</template>

<script>

    import MessageContainer from './messageContainer.vue'
    import InputMessage from './inputMessage.vue'

    export default {
        components: {
            MessageContainer,
            InputMessage,
        },

       data: function () {
            return {
                chatRooms: [],
                currentRoom: [],
                messages: [],
            }
        },

        methods: {
            test() {
                console.log(this.currentRoom);
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




