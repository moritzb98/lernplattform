
<template>
    <div class="chat_controls">
        <input class="neumorph--pressed neumorph--pressed--border input w-100"
                type="text"
                v-model="message"
                @keyup.enter="sendMessage()"
                placeholder="Schreibe eine Nachricht..."
            >
        <button class="neumorph chat_controls-send" @click="sendMessage()" >
            <span class="material-icons">send</span>
        </button>
    </div>
</template>


<script>
export default {
    props: ['room'],
    data: function() {
        return {
            message: ''
        }
    },
    methods: {
        sendMessage() {
            if( this.message == ' ') {
                return;
            }

            console.log(this.room);

            axios.post('/api/chat/room/' + this.room.id + '/message', {
                message: this.message
            })
            .then( response => {
                if( response.status == 201 ) {
                    this.message = '';
                    this.$emit('messagesent');
                }
            })

            .catch( error => {
                console.log( error );
            })
        }

    }

}
</script>
