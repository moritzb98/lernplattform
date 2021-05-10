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
                            <p class="card-lernmateral-thumbs-number">3174</p>
                        </div>
                    </div>
                    <div class="card-lernmaterial-last-column-container">
                        <div class="card-lernmaterial-date">{{file.date}}</div>
                        <div class="card-lernmaterial-date-icon-container">
                             <span class="material-icons-outlined">visibility</span>
                             <span class="material-icons-outlined">file_download</span>
                             <span class="material-icons-outlined">send</span>
                        </div>
                    </div>
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
            axios.get('/api/upload/'+this.$route.params.id)
            .then(response=>{
                console.log(response.data.test);
                this.file = response.data;
            });
        },
        methods: {

        }
    }
</script>

<style scoped>

.card-lernmaterial-middle-column-container{
    overflow: hidden;
    width: 50%;
}

.card-lernmaterial-last-column-container{
    text-align: right;
}

.card-lernmaterial-icon-container{
    min-width: 45px;
    margin-right: 10px;
}

.card-lernmaterial-headline{
    text-overflow: ellipsis;
    overflow: hidden;
}
</style>
