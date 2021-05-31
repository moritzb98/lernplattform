<template>
    <div>
        <!-- Header [Back] -->
        <div class="header_wrapper">
            <div class="header header--back">
                <div class="neumorph header_back d-flex align-items-center" @click="$router.go(-1)">
                    <span class="material-icons mr-2" >arrow_back</span>
                    <span class="mt-1">VERLASSEN</span>
                </div>
                <div class="header_title ml-5">
                    {{title}}
                </div>
            </div>
        </div>
        <div id="video-chat-window" class="fixed bg-gray-300 top-0 bottom-0 w-full h-full overflow-y-scroll grid grid-rows-3 grid-cols-2 md:grid-cols-3 gap-2 px-2 pt-2"></div>
        <div id="video-preview" class="fixed bg-gray-600 bottom-0 right-0 w-1/3 lg:w-1/5 mr-5 mb-5 sm:mr-10 sm:mb-10 overflow-hidden rounded-md shadow-xl"></div>

        <!-- Navigation -->
        <div class="nav_wrapper nav_wrapper--videochat" style="z-index: 1910;">
            <div class="nav">
                <a id="stopVideo" class="nav_item" @click="activeHandler">
                    <span id="VideoActive" class="material-icons neumorph neumorph--pressed active">videocam</span>
                </a>
                <a id="muteAudio" class="nav_item" @click="activeHandler">
                    <span id="AudioActive" class="material-icons neumorph neumorph--pressed active">mic</span>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                // accessToken: '',
                title: "Konferenz"
            }
        },
        methods : {
            activeHandler(event){
                var e = event.target;       

                e.classList.toggle('neumorph--pressed');
                e.classList.toggle('active');

                // Der Versuch, das Icon durch das durchgestrichene zu ersetzen
                // var htmlString = e.innerHTML;
                // e.innerHTML = htmlString+"_off";

            },
             getAccessToken : function () {
                const _this = this

                // Request a new token
                axios.get('/api/access_token')
                    .then(function (response) {
                        _this.accessToken = response.data
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        _this.connectToRoom()
                    });
            },
            connectToRoom : async function () {
                const _this = this
                const { connect, createLocalVideoTrack } = require('twilio-video');

                // Join to the Room with the given AccessToken and ConnectOptions.
                console.log(this.accessToken);
                const room = await connect(this.accessToken, { audio: true, video: true });

                // Make the Room available in the JavaScript console for debugging.
                window.room = room;
                this.addLocalParticipant(room.localParticipant)
                // Subscribe to the media published by RemoteParticipants already in the Room.
                room.participants.forEach(participant => this.addRemoteParticipant(participant));
                room.on('participantConnected', participant => this.addRemoteParticipant(participant));

                // Toggle Videocamera
                const stopVideo = document.getElementById('stopVideo');
                var activeElementVideo = document.getElementById('VideoActive');

                stopVideo.addEventListener("click", () => {
                    if(activeElementVideo.classList.contains("active")) {
                        room.localParticipant.videoTracks.forEach(track => {
                            track.track.enable();
                        });
                        console.log("Video an")
                    }else{
                        room.localParticipant.videoTracks.forEach(track => {
                            track.track.disable();
                        });
                        console.log("Video aus")
                    }                    
                });

                // Toggle Microphone
                const muteAudio = document.getElementById('muteAudio');
                var activeElementAudio = document.getElementById('AudioActive');

                muteAudio.addEventListener("click", () => {
                    if(activeElementAudio.classList.contains("active")) {
                        room.localParticipant.audioTracks.forEach(track => {
                            track.track.enable();
                        });
                        console.log("Audio an")
                    }else{
                        room.localParticipant.audioTracks.forEach(track => {
                            track.track.disable();
                        });
                        console.log("Audio aus")
                    }  
                    
                });
            },
            addLocalParticipant: function(participant) {

                // Create the video container
                this.createVideoContainer(participant)
                // Attach the
                participant.tracks.forEach(publication => {

                    if ('audio' == publication.kind)
                        return
                    this.publishTrack(publication.track, participant)
                })
            },
            addRemoteParticipant: function(participant) {
                this.createVideoContainer(participant)
                // Set up listener to monitor when a track is published and ready for use
                participant.on('trackSubscribed', track => {
                    this.publishTrack(track, participant);
                });
            },
            createVideoContainer: function (participant) {

                // Add a container for the Participant's media.
                const div = document.createElement('div');
                div.id = participant.sid;
                div.classList.add("overflow-hidden", "rounded-md", "bg-gray-100", "z-10");
                document.getElementById('video-chat-window').appendChild(div);
            },
            publishTrack: ( track, participant ) => {
                const videoContainer = document.getElementById(participant.sid);
                videoContainer.appendChild(track.attach())
            },
            getMyRooms() {
                this.axios.get('http://127.0.0.1:8000/api/getmyroom')
                    .then(response=>{
                        this.rooms=response.data,
                        console.log(this.rooms);
                    })
            },
            getRoom() {
                this.axios.get('http://127.0.0.1:8000/api/getRoom/'+roomid)
                    .then(response=>{
                        this.room=response.data,
                        console.log(this.room);
                    })
            }
        },
        mounted : function () {
            console.log('Video chat room loading...'),
            this.getAccessToken(),
            this.getRoom()
        }
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

    .nav_wrapper--videochat span {
        color: red;
    }

    .nav_wrapper--videochat .active {
        color: black;
    }

</style>
