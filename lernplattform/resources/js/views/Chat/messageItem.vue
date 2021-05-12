
<template>
    <div class="chat_message chat_message--others">
        <div class="chat_message-autor">{{ message.user.name }}</div>
            {{ message.message}}
            <!-- <p>{{currentDateTime()}}</p> -->
        <!-- <div class="chat_message-timestamp">{{createdAtDisplay}}</div> -->
        <div class="chat_message-timestamp">{{ message.created_at | moment("HH:mm") }}</div>
    </div>
        <!-- {{ message.user.name }}: {{ message.message}} -->
</template>


<script>

    export default {
        props: ['message'],
    }
</script>
