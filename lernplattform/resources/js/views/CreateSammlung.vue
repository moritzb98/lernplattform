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

        <!-- Content  -->
        <div class="background-container">
            <div class="background">
                <span class="material-icons-outlined icon-für-oberen-Bereich">biotech</span>
                <div class="überschrift-oberer-Bereich" >Sammlung erstellen</div>
            </div>

            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>
        <div class="headline-text-field">Name der Sammlung</div>
        <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
            <input v-model="collection.name" type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
        </label>
        <div class="small-button-container">
            <router-link class="button-small list-items button-link router-text" to="/spa/Lernmaterial">
                    <span class="material-icons-outlined button-icon-small">close</span>
                    <div class="list-items-text">Abbrechen</div>

            </router-link>
            <div @click="createCollection()" class="list-items button-small">
                <span class="material-icons-outlined button-icon-small">check</span>
                <div class="list-items-text">Erstellen</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                collection:{
                    name:"",
                },
                title: "Erstellen"
            }
        },

        methods: {
            createCollection(){
                axios.post('/api/collection/create',this.collection)
                .then(response=>{
                    console.log(response.data);
                    Vue.$toast.success('Sammlung erfolgreich erstellt.', {});
                    this.$router.push({ path: '/spa/Lernmaterial' });
                });
            }
        }
    }
</script>

<style scoped>
    .button-small{
        width: 40%;
        height: 35px;
        justify-content: center;
    }

    .small-button-container{
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-around;
        margin-top: 40px;
    }

    .button-icon-small{
        margin-right: 10px;
    }

    .background-container{
        width: 100vw;
        margin-left: -16px;
    }

    .background{
        width: 100%;
        height: 120px;
        background-color: #F1D2CD;
        border-radius: 0px 0px 0px 30px;
        display: flex;
        flex-wrap: nowrap;
        position: relative;
    }

    .fabriges-rechteck{
        width: 100%;
        height: 50px;
        background-color: #F1D2CD;
    }

    .weißes-rechteck{
        width: 100%;
        height: 52px;
        background-color: #F1F1F1;
        border-radius: 0px 60px 0px 0px;
    }

    .überschrift-oberer-Bereich{
        font-size: 1.5em;
        color: #ED553B;
        font-weight: bold;
        margin: auto;
    }

    .icon-für-oberen-Bereich{
        font-size: 8em;
        color: #F0A89B;
        margin-bottom: -14px;
        margin-left: 4px;
        position: absolute;
        bottom: 0;
    }

</style>
