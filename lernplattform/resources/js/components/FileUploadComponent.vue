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
            <div class="background">
                <span class="material-icons-outlined icon-für-oberen-Bereich">biotech</span>
                <div class="überschrift-oberer-Bereich" >
                    Medien hochladen
                </div>
            </div>
            <div class="fabriges-rechteck">
                <div class="weißes-rechteck"></div>
            </div>
        </div>

        <!-- Content  -->
                <!-- Select -->
        <div class="headline-text-field">Kategorie wählen</div>
        <select class="mdc-button mdc-button--raised button--big dropdown" name="categories" v-model="collection.category_id">
            <option selected="selected" value="">Bitte wähle eine Kategorie aus</option>
            <option v-for="categorie in categories" :key="categorie.name" :value="categorie.id">
                {{categorie.name}}
            </option>
        </select>
        <!-- Select End -->
        <br><br>


        <div class="container">
            <div class="mdc-form-field">
                <div class="mdc-radio">
                    <input class="mdc-radio__native-control" type="radio" id="radio-1" name="radios" value="checked" v-model="test" unchecked>
                    <div class="mdc-radio__background mdc-radio__background-container">
                        <div class="mdc-radio__outer-circle mdc-radio__outer-circle-modified"></div>
                        <div class="mdc-radio__inner-circle mdc-radio__inner-circle-modified"></div>
                </div>
                </div>

        <div class="content_wrapper">
            <div class="row justify-content-center">
                <div class="col-md-8">

            <div class="container">
                <div class="mdc-form-field">
                    <div class="mdc-radio">
                        <input class="mdc-radio__native-control" type="radio" id="radio-1" name="radios" value="checked" v-model="test" unchecked>
                        <div class="mdc-radio__background mdc-radio__background-container">
                            <div class="mdc-radio__outer-circle mdc-radio__outer-circle-modified"></div>
                            <div class="mdc-radio__inner-circle mdc-radio__inner-circle-modified"></div>
                    </div>
                    </div>

                    <label class="radio-button-label" for="radio-1">
                    <div class="urheber"> Hiermit bestätige ich dass die von mir geteilten Dateien nicht gegen das Urheberrecht verstoßen. Skillwire haftet nicht für Verstöße gegen das Urheberrecht. </div>
                    </label>
                </div>


                        <div class="card-body">
                            <form @submit="formSubmit" enctype="multipart/form-data">
                                <input type="file" class="form-control" v-on:change="onChange">
                                <button v-if="test" class="mdc-button mdc-button--raised button--big">
                                    <span class="button-text"> Datei hochladen </span>
                                </button>
                                <p class="notCheckedText" v-else>Du kannst die Datei erst hochladen, sobald du der oben genannte Erklärung zustimmst.</p>
                            </form>
                        </div>
                    </div>
                </div>
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
                name: '',
                file: '',
                success: '',
                title: "Upload",
                test: false,
                collection:{
                    name:"",
                    category_id: null,
                },
                categories: [],
            };
        },
        mounted() {
            axios.get('/api/categories')
                .then(response=>{
                    this.categories = response.data;
                });
        },
        methods: {
            onChange(e) {
                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                let data = new FormData();
                data.append('file', this.file);

                axios.post('/api/upload', data, config)
                    .then((res) => {
                        Vue.$toast.success('Datei erfolgreich hochgeladen', {});
                        this.$router.push({ path: '/spa/documents' });
                    })
                    .catch(function (err) {
                        Vue.$toast.error('Beim Hochladen ist etwas schief gegangen :(', {});
                    });

            },
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

    .Create{
    margin-right: 10px;
    font-size: 30px;
    }

    .margin{
        margin-right: 10px;
    }

    .urheber{
       font-size: 13px;
       font-family: Open Sans;
    }

    .Pfeil{
    float: left;
    display: flex;
    margin-right: 10px;
    }

    .form{
           background-color:#F1F1F1;

    }

    .form-control{
        background-color: #F1F1F1;
        border-style: none;
    }

    .btn{
     background: linear-gradient(to bottom right,white, #F1F1F1);
        height: 36px;
        width: 36px;
        padding:0px;
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
    }

    .notCheckedText{
        font-size: 13px;
        font-family: Open Sans;
        margin-top: 20px;
    }



</style>
