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
        <!-- <div id="video-chat-window" class="fixed bg-gray-300 top-0 bottom-0 w-full h-full overflow-y-scroll grid grid-rows-3 grid-cols-2 md:grid-cols-3 gap-2 px-2 pt-2"></div>
        <div id="video-preview" class="fixed bg-gray-600 bottom-0 right-0 w-1/3 lg:w-1/5 mr-5 mb-5 sm:mr-10 sm:mb-10 overflow-hidden rounded-md shadow-xl"></div> -->


        <!-- Gerendertes HTML Element -->
        <!-- <div id="video-chat-window" class="fixed bg-gray-300 top-0 bottom-0 w-full h-full overflow-y-scroll grid grid-rows-3 grid-cols-2 md:grid-cols-3 gap-2 px-2 pt-2">
            <div id="PAcaa8475ec884ebbf7782463f2992f341" class="overflow-hidden rounded-md bg-gray-100 z-10 w-50">
                <video autoplay="" playsinline="" data-ss1621863899="1"></video>
            </div>
            <div id="PA7690d6a7e72b6d04f75811ba7a9e74f1" class="overflow-hidden rounded-md bg-gray-100 z-10">
                <audio autoplay="" data-ss1621863899="1"></audio>
                <video autoplay="" playsinline="" data-ss1621863899="1"></video>
            </div>
        </div> -->

        <!-- hihihihihi  -->

        <!-- Navigation -->
        <div class="nav_wrapper nav_wrapper--videochat" style="z-index: 1910;">
            <div class="nav">
                <div class="nav_item neumorph">
                    <span class="material-icons">videocam</span>
                </div>
                <div class="nav_item neumorph">
                    <span class="material-icons">mic</span>
                </div>
            </div>
        </div>




    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                // accessToken: '',
                title: "Biochemie"
            }
        },
        // methods : {
        //      getAccessToken : function () {
        //         const _this = this

        //         // Request a new token
        //         axios.get('/api/access_token')
        //             .then(function (response) {
        //                 _this.accessToken = response.data
        //             })
        //             .catch(function (error) {
        //                 console.log(error);
        //             })
        //             .then(function () {
        //                 _this.connectToRoom()
        //             });
        //     },
        //     connectToRoom : async function () {
        //         const _this = this
        //         const { connect, createLocalVideoTrack } = require('twilio-video');

        //         // Join to the Room with the given AccessToken and ConnectOptions.
        //         console.log(this.accessToken);
        //         const room = await connect(this.accessToken, { audio: true, video: true });

        //         // Make the Room available in the JavaScript console for debugging.
        //         window.room = room;
        //         this.addLocalParticipant(room.localParticipant)
        //         // Subscribe to the media published by RemoteParticipants already in the Room.
        //         room.participants.forEach(participant => this.addRemoteParticipant(participant));
        //         room.on('participantConnected', participant => this.addRemoteParticipant(participant));
        //     },
        //     addLocalParticipant: function(participant) {

        //         // Create the video container
        //         this.createVideoContainer(participant)
        //         // Attach the
        //         participant.tracks.forEach(publication => {

        //             if ('audio' == publication.kind)
        //                 return
        //             this.publishTrack(publication.track, participant)
        //         })
        //     },
        //     addRemoteParticipant: function(participant) {
        //         this.createVideoContainer(participant)
        //         // Set up listener to monitor when a track is published and ready for use
        //         participant.on('trackSubscribed', track => {
        //             this.publishTrack(track, participant);
        //         });
        //     },
        //     createVideoContainer: function (participant) {

        //         // Add a container for the Participant's media.
        //         const div = document.createElement('div');
        //         div.id = participant.sid;
        //         div.classList.add("overflow-hidden", "rounded-md", "bg-gray-100", "z-10");
        //         document.getElementById('video-chat-window').appendChild(div);
        //     },
        //     publishTrack: ( track, participant ) => {
        //         const videoContainer = document.getElementById(participant.sid);
        //         videoContainer.appendChild(track.attach())
        //     },

        // },
        // mounted : function () {
        //     console.log('Video chat room loading...')

        //     this.getAccessToken()
        // }
    }
</script>

<style>
    #video-chat-window{
        width: 100%;
    }

    #video-preview{
        width: 100%;
    }

    video{
        width: 100%;
    }
</style>
