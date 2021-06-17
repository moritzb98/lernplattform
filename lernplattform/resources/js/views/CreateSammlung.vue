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


        <div class="background-container">
            <div class="background bunt">
                <span class="material-icons-outlined icon-für-oberen-Bereich icon-weiß">source</span>
                <div class="überschrift-oberer-Bereich text-weiß" >Sammlung</div>
            </div>

            <div class="fabriges-rechteck bunt">
                <div class="weißes-rechteck"></div>
            </div>
        </div>
        <div class="headline-text-field">Name der Sammlung</div>
        <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
            <input maxlength="30" v-model="collection.name" type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
        </label>

        <!-- Select -->
        <div class="headline-text-field">Kategorie wählen</div>
        <select class="mdc-button mdc-button--raised button--big dropdown" name="categories" v-model="collection.category_id">
            <option selected="selected" value="">Bitte wähle eine Kategorie aus</option>
            <option v-for="categorie in categories" :key="categorie.name" :value="categorie.id">
                {{categorie.name}}
            </option>
        </select>
        <!-- Select End -->
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

        <!-- Nav -->
        <Nav />
    </div>
</template>

<script>
    export default {
        data() {
            return {
                collection:{
                    name:"",
                    category_id: null,
                },
                title: "Erstellen",
                categories: [],
            }
        },

        mounted() {
            axios.get('/api/categories')
                .then(response=>{
                    this.categories = response.data;
                });
        },
        methods: {
            createCollection(){
                if(this.collection.category_id != null){
                    axios.post('/api/collection/create',this.collection)
                    .then(response=>{
                        Vue.$toast.success('Sammlung erfolgreich erstellt.', {});
                        this.$router.push({ path: '/spa/Lernmaterial' });
                    });
                } else {
                    Vue.$toast.error('Du musst eine Kategorie auswählen.', {});
                }
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


    .dropdown{
        margin-top: 0px;
        height: 45px;
    }

</style>
