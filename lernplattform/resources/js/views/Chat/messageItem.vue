
<template>
    <div class="chat_message chat_message--others">
        <div class="chat_message-autor">{{ message.user.name }}</div>
            {{ message.message}}
        <div class="chat_message-timestamp">{{ message.created_at | moment("HH:mm") }} - <i>{{ message.created_at | moment("L") }}</i></div>
    </div>
</template>


<script>

    export default {
        props: ['message'],
    }
</script>
