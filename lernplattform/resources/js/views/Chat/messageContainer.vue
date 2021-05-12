
<template>
    <!-- <div class="h-96 w-full">
        <div class="h-full p-2 flex flex-col-reverse overflow-scroll" >
            <div v-for="(message, index) in messages" :key="index">
                <message-item :message="message" />
            </div>
        </div>
    </div> -->


    <!-- Chat -->
    <div class="">
        <!-- Nachricht From Others -->
        <div class="chat_message-wrapper" v-for="(message, index) in messages" :key="index">
            <div class="chat_message chat_message--others">
                <div class="chat_message-autor">Roflcopter</div>
                    <message-item :message="message" />
                <div class="chat_message-timestamp">21:42</div>
            </div>
        </div>

        <!-- Nachricht From Me -->
        <!-- <div class="chat_message-wrapper">
            <div class="chat_message chat_message--me">
                <div class="chat_message-autor">Max</div>
                    re et dolore magna aliquyam erat, sed dia
                <div class="chat_message-timestamp">21:42</div>
            </div>
        </div> -->
    </div>

</template>

<script>
import messageItem from './messageItem.vue'
export default {
  components: { messageItem },
    props: ['messages']

}
</script>
