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
            <div>* Pflichtfelder</div>
            <form action="#" @submit.prevent="handleRegister">
                <div class="headline-text-field">E-Mail*</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input v-model="registerData.email" class="mdc-text-field__input text-field__input--modified" type="email" placeholder="" aria-label="Label">
                </label>
                <div class="headline-text-field">Benutzername*</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input v-model="registerData.name" class="mdc-text-field__input text-field__input--modified" type="text" placeholder="" aria-label="Label">
                </label>
                <div class="headline-text-field">Passwort*</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input v-model="registerData.password" class="mdc-text-field__input text-field__input--modified" type="password" placeholder="" aria-label="Label">
                </label>
                <!--<div class="headline-text-field">Passwort wiederholen*</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input v-model="registerData.passwordConfirm" class="mdc-text-field__input text-field__input--modified" type="password" placeholder="" aria-label="Label">
                </label>-->

                <div class="headline-text-field">Interessen</div>
                <multiselect v-model="interestData" :options="interestsArray" :multiple="true"></multiselect>


                <div class="headline-text-field">Aktuelle Tätigkeit</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input v-model="registerData.job" class="mdc-text-field__input text-field__input--modified" type="text" placeholder="" aria-label="Label">
                </label>
                <div class="headline-text-field">Alter</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input v-model="registerData.age" class="mdc-text-field__input text-field__input--modified" type="text" placeholder="" aria-label="Label">
                </label>

                <div class="mdc-form-field">
                    <div class="mdc-radio">
                        <input v-model="checkedAgb" value="checked" class="mdc-radio__native-control" type="radio" id="radio-1" name="radios">
                        <div class="mdc-radio__background mdc-radio__background-container">
                            <div class="mdc-radio__outer-circle mdc-radio__outer-circle-modified"></div>
                            <div class="mdc-radio__inner-circle mdc-radio__inner-circle-modified"></div>
                        </div>
                    </div>
                    <label class="radio-button-label" for="radio-1">Ich erkläre mich mit den AGB von Skillwire einverstanden.</label>
                </div>

                <button class="mdc-button mdc-button--raised button--big" type="submit">
                    <span class="button-text">Registrieren</span> <span class="material-icons">chevron_right</span>
                </button>
        </form>

        <div class="text-no-account">Bereits einen Account? <router-link to="/spa/Login"><span class="text-bold">Jetzt einloggen</span></router-link></div>


    <br>
    <br>
    </div>

</template>

<script>
import Multiselect from 'vue-multiselect'
    export default {
        components: { Multiselect },
        data() {
            return {
                secrets:[],
                formData:{
                    email:'',
                    password:'',
                },
                registerData:{
                    name: '',
                    email: '',
                    password: '',
                    job:'',
                    age:'',
                },
                interestData:[],
                title: "Registrierung",
                checkedAgb: false,
                interestsArray: [],
            }
        },
        mounted() {
            // Get all Interests
            axios.get('/api/interests/getall').then(response => {
                for(var i=0; i<response.data.length; i++){
                    this.interestsArray.push(response.data[i].name);
                }
            });
        },
        methods: {
            handleLogin() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/login', this.formData).then(response => {
                        console.log(response);
                        this.registerInterests();
                        this.$router.push({ path: '/spa/Dashboard' });
                    });
                });
            },
            handleRegister() {
                if(!this.checkedAgb){
                    Vue.$toast.error('Du musst erst den AGBs zsutimmen.', {});
                }else{
                    axios.get('/sanctum/csrf-cookie').then(response => {
                        axios.post('/registernormal', this.registerData).then(response => {
                            console.log(response);
                            this.formData.email=this.registerData.email;
                            this.formData.password=this.registerData.password;
                            Vue.$toast.success('Registrierung erfolgreich', {});
                            this.handleLogin();
                        }).catch(error => {
                            if(error.response.status === 422){
                                Vue.$toast.error('Die angebenen Daten sind falsch, du brauchst eine valide E-Mail und ein Passwort mit mind. 8 Zeichen, einem Sonderzeichen, einer Zahl und einem Großbuchstaben.', {});
                            }else{
                                Vue.$toast.error('Bei der Registrierung ist etwas schifegegangen', {});
                            }
                        });
                    });
                }
            },
            registerInterests() {
                axios.post('/api/interests/send', this.interestData).then(response => {
                    console.log(response);
                });
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped>

    .text-no-account{
        padding-top: 2em;
        font-family: 'Open Sans', sans-serif;

    }

    .text-bold{
        font-weight: bold;
        color: #212121;
    }

    .notCheckedText{
        font-size: 15px;
        font-family: Open Sans;
        margin-top: 20px;
        font-weight: bold;
    }



</style>

<style>
    .multiselect__tags{
        border-radius: 28px;
        box-shadow: inset 6px 6px 10px 0 rgb(0 0 0 / 20%), inset -6px -6px 10px 0 white, 12px 12px 24px 0 rgb(0 0 0 / 20%), -12px -12px 24px 0 rgb(255 255 255 / 50%);
        overflow: hidden;
    }
</style>
