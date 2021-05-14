<template>
    <div>
        <!-- Header -->
        <div class="header_wrapper">
            <div class="header">
                <div class="header_title">
                    {{title}}
                </div>
                <router-link to="/spa/Suche">
                    <span class="material-icons header_search">search</span>
                </router-link>
            </div>
        </div>

        <!-- Content  -->
        <div class="row justify-content-center">
            <div class="col-md-8">

            <div class="Pfeil">
             <button class="mdc-button mdc-button--raised mdc-button-back margin">
                <span class="material-icons-outlined">arrow_back</span>
            </button>
                <div class="Create">
                 <h2> Datei </h2>
                </div>
            </div>



        <div class="container">
            <div class="mdc-form-field">
                <div class="mdc-radio">
                    <input class="mdc-radio__native-control" type="radio" id="radio-1" name="radios" unchecked>
                    <div class="mdc-radio__background mdc-radio__background-container">
                        <div class="mdc-radio__outer-circle mdc-radio__outer-circle-modified"></div>
                        <div class="mdc-radio__inner-circle mdc-radio__inner-circle-modified"></div>
                </div>
                </div>

                <label class="radio-button-label" for="radio-1">
                <div class="urheber"> Hiermit bestätige ich dass die von mir geteilten Dateien von mir erstellt worden sind. Skillwire haftet nicht für Verstöße gegen das Urheberrecht. </div>
                </label>

                    </div>


                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success">
                            {{success}}
                        </div>

                        <form @submit="formSubmit" enctype="multipart/form-data">
                            <input type="file" class="form-control" v-on:change="onChange">
                            <button class="mdc-button mdc-button--raised button--big">
                            <span class="button-text"> Datei hochladen </span>
                            </button>
                        </form>
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
                name: '',
                file: '',
                success: '',
                title: "Upload"
            };
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
                    .then(function (res) {
                        existingObj.success = res.data.success;
                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });
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



</style>
