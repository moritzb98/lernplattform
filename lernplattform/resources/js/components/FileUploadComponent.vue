<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            <div class="h2">
            <h2> Erstellen </h2>  
            </div>

            <div class="Pfeil">
             <button class="mdc-button mdc-button--raised mdc-button-back">
                <span class="material-icons-outlined">arrow_back</span>           
            </button> 
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

                <label class="radio-button-label" for="radio-1"> Hiermit bestätige ich dass die von mir geteilten
                Dateien von mir stammen und ich nicht gegen das Urheberrecht verstoße.</label>
           
                    </div>
                    <div class="card-body">

                        <div v-if="success != ''" class="alert alert-success">
                            {{success}}
                        </div>

                        <form @submit="formSubmit" enctype="multipart/form-data">
                            <input type="file" class="form-control" v-on:change="onChange">
                            <button class="btn btn-primary btn-block">Datei hochladen</button>
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
    
    .h2{
    float: right; 
    }

    .Pfeil{
    float: left;
    }

    .form{
           background-color:#F1F1F1;
 
    }

    .btn{
    font-size: 15px;
    border:1px solid rg (255, 255, 255);
    background-color:#F1F1F1;
    }



</style>
