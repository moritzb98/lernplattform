<template>
    <div>

        <h1>Registrierung</h1>
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
                <div class="headline-text-field">Passwort wiederholen*</div>
                <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                    <input v-model="registerData.passwordConfirm" class="mdc-text-field__input text-field__input--modified" type="password" placeholder="" aria-label="Label">
                </label>

                <div class="headline-text-field">Interessen</div>
                <div v-for="interest in interests" :class="{chippressed:interest.selected}" @click="$set(interest, 'selected', !interest.selected)" class="mdc-chip mdc-chip-filter" role="row">
                    <div class="mdc-chip__ripple"></div>
                    <span role="gridcell">
                        <span role="button" tabindex="0" class="mdc-chip__primary-action">
                            <span class="mdc-chip__text">{{interest.name}}</span>
                        </span>
                    </span>
                </div>

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
                        <input class="mdc-radio__native-control" type="radio" id="radio-1" name="radios" checked>
                        <div class="mdc-radio__background mdc-radio__background-container">
                            <div class="mdc-radio__outer-circle mdc-radio__outer-circle-modified"></div>
                            <div class="mdc-radio__inner-circle mdc-radio__inner-circle-modified"></div>
                        </div>
                    </div>
                    <label class="radio-button-label" for="radio-1">Datenschutz bla</label>
                </div>
                <div class="mdc-form-field">
                    <div class="mdc-radio">
                        <input class="mdc-radio__native-control" type="radio" id="radio-1" name="radios" checked>
                        <div class="mdc-radio__background mdc-radio__background-container">
                            <div class="mdc-radio__outer-circle mdc-radio__outer-circle-modified"></div>
                            <div class="mdc-radio__inner-circle mdc-radio__inner-circle-modified"></div>
                        </div>
                    </div>
                    <label class="radio-button-label" for="radio-1">Datenschutz bla</label>
                </div>
                <button class="mdc-button mdc-button--raised button--big" type="submit">
                    <span class="button-text">Registrieren</span> <span class="material-icons">chevron_right</span>
                </button>
        </form>

            <div class="text-no-account">Bereits einen Account? <span class="text-bold">Jetzt einloggen</span></div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    </div>

</template>

<script>
    export default {
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
                    passwordConfirm: '',
                    job:'',
                    age:'',
                },
                interests:[],
                interestData:[],

            }
        },
        mounted() {
            // Get all Interests
            axios.get('/api/interests/getall').then(response => {
                for(var i=0; i<response.data.length; i++){
                    console.log(response.data[i].name);
                    this.interests.push({name: response.data[i].name, selected: false});
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
                this.pushInterests();
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/registernormal', this.registerData).then(response => {
                        console.log(response);
                        this.formData.email=this.registerData.email;
                        this.formData.password=this.registerData.password;
                        this.handleLogin();
                    });
                });
            },
            pushInterests() {
                for(var i = 0; i < this.interests.length; i++){
                    if(this.interests[i].selected){
                        this.interestData.push(this.interests[i].name);
                    }
                };
            },
            registerInterests() {
                axios.post('/api/interests/send', this.interestData).then(response => {
                    console.log(response);
                });
            }
        }
    }
</script>

<style scoped>

    .text-no-account{
        padding-top: 2em;
        font-family: 'Open Sans', sans-serif;

    }

    .text-bold{
        font-weight: bold;
    }

</style>
