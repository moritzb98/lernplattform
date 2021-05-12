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

                        <!-- Nachricht From Others -->
                        <div class="chat_message-wrapper">
                            <div class="chat_message chat_message--others">
                                <div class="chat_message-autor">Roflcopter</div>
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, se
                                <div class="chat_message-timestamp">21:42</div>
                            </div>
                        </div>

                        <!-- Nachricht From Me -->
                        <div class="chat_message-wrapper">
                            <div class="chat_message chat_message--me">
                                <div class="chat_message-autor">Max</div>
                                    re et dolore magna aliquyam erat, sed dia
                                <div class="chat_message-timestamp">21:42</div>
                            </div>
                        </div>

                        <div class="chat_message-wrapper">
                            <div class="chat_message chat_message--others">
                                <div class="chat_message-autor">Roflcopter 60000</div>
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve
                                <div class="chat_message-timestamp">21:42</div>
                            </div>
                        </div>

                        <div class="chat_message-wrapper">
                            <div class="chat_message chat_message--me">
                                <div class="chat_message-autor">lss</div>
                                    r sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                <div class="chat_message-timestamp">21:42</div>
                            </div>
                        </div>

                    </div>

                    <!-- Nachrichten Optionen -->
                    <div class="chat_controls">
                        <input class="neumorph--pressed neumorph--pressed--border input w-100">
                        <button class="neumorph chat_controls-send">
                            <span class="material-icons">send</span>
                        </button>
                    </div>

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
    export default {
    }
</script>
