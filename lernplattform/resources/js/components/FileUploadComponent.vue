<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
             <button class="mdc-button mdc-button--raised mdc-button-back">
                <span class="material-icons-outlined">arrow_back</span>             
            </button> 
        </div>

        <h2> Erstellen </h2>


                <div class="mdc-card mdc-card-lernmaterial">
                    <div class="card-header">Uploads</div>
                    <div class="container">
                    <div class="mdc-form-field">
                <div class="mdc-radio">
                    <input class="mdc-radio__native-control" type="radio" id="radio-1" name="radios" unchecked>
                    <div class="mdc-radio__background mdc-radio__background-container">
                        <div class="mdc-radio__outer-circle mdc-radio__outer-circle-modified"></div>
                        <div class="mdc-radio__inner-circle mdc-radio__inner-circle-modified"></div>
                    </div>
                </div>
                <label class="radio-button-label" for="radio-1"> Hiermit bestätige ich dass ich 
                Wer gegen das Urheberrecht verstößt (z.B. Bilder oder Texte unerlaubt kopiert), macht sich gem. §§ 106 ff UrhG strafbar, wird zudem kostenpflichtig abgemahnt und muss Schadensersatz leisten (§ 97 UrhG).</label>
            </div>
                    </div>
                    <div class="card-body">

                        <div v-if="success != ''" class="alert alert-success">
                            {{success}}
                        </div>

                        <form @submit="formSubmit" enctype="multipart/form-data">
                            <input type="file" class="form-control" v-on:change="onChange">
                            <button class="btn btn-primary btn-block">Erstellen</button>
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
                success: ''
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
    .text-no-account{
        padding-top: 2em;
        font-family: 'Open Sans', sans-serif;
        color: #212121;

    }

    .text-bold{
        font-weight: bold;
        color: #212121;
    }

    .h1{
        font-weight: bold;

    }

    .h2{
        font-size: 17;
    }

.btn{
    font-size: 15px;
    background-color: rgb(255, 255, 255);
    border-color: rg (255, 255, 255);
}


</style>
