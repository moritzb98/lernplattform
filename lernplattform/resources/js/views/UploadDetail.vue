<template>
    <div>
        <h1>Hallo</h1>
        <p>{{file}}</p>
        <p>{{file.displayname}}</p>
            <!--In der Card sollte man denke ich auch noch sehen, in welchen Sammlungen man den Upload abgespeichert hat.
            Geht das, @Moritz?-->
            <div class="mdc-card mdc-card-lernmaterial">
                <div class="card-lernmaterial-spacing">
                    <div class="card-lernmaterial-icon-container">
                        <span class="material-icons material-icons-lernmaterial">school</span>
                    </div>
                    <div class="card-lernmaterial-middle-column-container">
                        <div class="mdc-chip-container">
                            <div class="mdc-chip mdc-chip--red mdc-chip-lernmaterial" role="row">
                                <span class="mdc-chip__text">Skript</span>
                            </div>
                        </div>
                        <div class="card-lernmaterial-headline">{{file.displayname}}</div>
                        <div class="card-lernmateral-thumb">
                            <span class="material-icons-outlined material-icons-outlined-space-right">thumb_up</span>
                            <!-- Änderungen starten -->
                            <div class="card-lernmateral-thumbs-number-container">
                                <p class="card-lernmateral-thumbs-number">3174</p>
                            </div>
                            <!-- Änderungen enden -->
                        </div>
                    </div>
                    <div class="card-lernmaterial-last-column-container">
                        <div class="card-lernmaterial-date">{{file.date}}</div>
                        <div class="card-lernmaterial-date-icon-container">
                            <!-- Änderungen starten -->
                                <span class="material-icons-outlined card-lernmaterial-date-icon">visibility</span>
                                <span class="material-icons-outlined card-lernmaterial-date-icon">file_download</span>
                                <span class="material-icons-outlined card-lernmaterial-date-icon">send</span>
                            <!-- Änderungen enden -->
                        </div>
                    </div>
                </div>
                <div>
                    <hr>

                </div>
            </div>

    </div>
</template>


<script>
    export default {
        data() {
            return {
                file:{}

            }
        },
        mounted(){
            this.file.id = this.$route.params.id;
            axios.get('/api/upload/'+this.$route.params.id)
            .then(response=>{
                this.file = response.data;
            });

            axios.post('/api/files/showCollectionsToFile',this.file)
            .then(response=>{
                console.log(response.data);
            });
        },
        methods: {

        }
    }
</script>


