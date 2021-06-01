<template>
    <div>
        <!-- Header [Search] -->
        <div class="header_wrapper">
            <div class="header header--search">
                <span class="material-icons neumorph header_back" @click="$router.go(-1)">arrow_back</span>
                <div class="header_title">
                    {{title}}
                </div>
                <router-link to="/spa/Suche">
                    <span class="material-icons neumorph header_search">search</span>
                </router-link>
            </div>
        </div>

        <div class="background-container">
            <div class="background">
                <span class="material-icons-outlined icon-für-oberen-Bereich">description</span>
                <div class="überschrift-oberer-Bereich" >Karteikartenset</div>
            </div>

            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <div>
            <div>
                <!-- Select -->
                <div class="headline-text-field">Kategorie wählen</div>
                <select class="mdc-button mdc-button--raised button--big dropdown" name="categories" v-model="karteikartenset.category_id">
                    <option selected="selected" value="">Bitte wähle eine Kategorie aus </option>
                    <option v-for="categorie in categories" :key="categorie.name" :value="categorie.id">
                        {{categorie.name}}
                    </option>
                </select>
                <!-- Select End -->
            </div>
            <br>

            <div class="headline-text-field">Titel</div>
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                <input v-model="karteikartenset.name" type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
            </label>
            <hr class="trennungslinie-dick">

            <div class="fragen-container" v-for="karteikarte in karteikarten" :key="karteikarte.index">
                <h5>{{karteikarte.index}}.Karteikarte</h5>
                <div class="headline-text-field">Vorderseite</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input v-model="karteikarte.frontside" type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
                </label>
                <div class="headline-text-field">Rückseite</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input v-model="karteikarte.backside" type="text" class="mdc-text-field__input text-field__input--modified " placeholder="" aria-label="Label">
                </label>
            </div>

            <button @click="addKarteikarte()" class="mdc-button mdc-button--raised button--big button-dashed-border mdc-card--new">
                <span class="button-text">Weitere Karteikarte</span> <span class="material-icons">add</span>
            </button>

            <hr class="trennungslinie-dick">
            <button @click="createSet()" class="mdc-button mdc-button--raised button--big ohne-abstand">
                <span class="button-text">Karteikartenset erstellen</span> <span class="material-icons">navigate_next</span>
            </button>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>



        </div>

        <!-- Nav -->
        <Nav />
    </div>
</template>


<script>
    export default {
        data() {
            return {
                title: "Erstellen",
                karteikartenset: {
                    name: "",
                    category_id: "",
                },
                categories:[],
                karteikarten:[{
                    index: 1,
                    frontside: '',
                    frontside: ''
                }],
                count: 2,
            }
        },
        mounted() {
            axios.get('/api/categories')
                .then(response=>{
                    this.categories = response.data;
                });
        },
        methods:{
            createSet(){
                if(this.karteikartenset.category_id != "" && this.karteikartenset.name){
                    // Create Set
                    axios.post('/api/karteikartensets/create', this.karteikartenset)
                    .then(response=>{
                        // Create Cards to Set
                        axios.post('/api/karteikarten/create', {karteikarten: this.karteikarten, setid: response.data})
                        .then(response=>{
                            Vue.$toast.success('Karteikartenset erfolgreich erstellt.', {});
                            this.$router.push({ path: '/spa/Karteikartensets' });
                        }).catch(err => {
                            Vue.$toast.error('Beim Erstellen ist etwas schief gegangen :(', {});
                        });
                    });
                } else {
                    Vue.$toast.error('Du musst eine Kategorie auswählen und einen Namen angeben.', {});
                }
            },
            addKarteikarte(){
                this.karteikarten.push({
                    index: this.count
                });
                this.count++;
            }
        }
    }
</script>

<style scoped>
    .trennungslinie-dick{
        border: 2px solid #DEDEDE;
        margin-right: -15px;
        margin-left: -15px;
    }

    .fragen-container{
        border-radius: 20px;
        padding: 20px;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow: -5px -5px 13px #fff, 5px 5px 13px #0e0e0e40;
        margin-bottom: 20px;
    }

    .button-dashed-border{
        height: 50px;
        margin-top: 25px;
    }

    .ohne-abstand{
        margin-top: 0px;
    }

    .dropdown{
        margin-top: 0px;
        height: 45px;
        color: #212121;
        padding-left: 20px;
    }

</style>
