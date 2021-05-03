<template>
    <div>

       <!-- Register Form -->
       <h1>Register</h1>
       <form action="#" @submit.prevent="handleRegister">
            <input type="text" name="name" v-model="registerData.name"><br>
            <input type="email" name="email" v-model="registerData.email"><br>
            <input type="password" name="password" v-model="registerData.password"><br>
            <input type="password" name="password" v-model="registerData.passwordConfirm"><br>
            <button type="submit">Register</button>
       </form>

        <h1>Registrierung</h1>
            <div>* Pflichtfelder</div>
            <div class="headline-text-field">E-Mail*</div>
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                <input class="mdc-text-field__input text-field__input--modified" type="text" placeholder="" aria-label="Label">
            </label>
            <div class="headline-text-field">Passwort*</div>
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                <input class="mdc-text-field__input text-field__input--modified" type="text" placeholder="" aria-label="Label">
            </label>

            <div class="headline-text-field">Interessen</div>
            <div class="mdc-chip mdc-chip-filter" role="row">
                <div class="mdc-chip__ripple"></div>
                <span role="gridcell">
                    <span role="button" tabindex="0" class="mdc-chip__primary-action">
                        <span class="mdc-chip__text">Informatik</span>
                    </span>
                </span>
            </div>
            <div class="mdc-chip mdc-chip-filter pressed" role="row">
                <div class="mdc-chip__ripple"></div>
                <span role="gridcell">
                    <span role="button" tabindex="0" class="mdc-chip__primary-action">
                        <span class="mdc-chip__text">Biologie</span>
                    </span>
                </span>
            </div>
            <div class="mdc-chip mdc-chip-filter" role="row">
                <div class="mdc-chip__ripple"></div>
                <span role="gridcell">
                    <span role="button" tabindex="0" class="mdc-chip__primary-action">
                        <span class="mdc-chip__text">Chemie</span>
                    </span>
                </span>
            </div>
            <div class="mdc-chip mdc-chip-filter" role="row">
                <div class="mdc-chip__ripple"></div>
                <span role="gridcell">
                    <span role="button" tabindex="0" class="mdc-chip__primary-action">
                        <span class="mdc-chip__text">Sport</span>
                    </span>
                </span>
            </div>
            <div class="mdc-chip mdc-chip-filter" role="row">
                <div class="mdc-chip__ripple"></div>
                <span role="gridcell">
                    <span role="button" tabindex="0" class="mdc-chip__primary-action">
                        <span class="mdc-chip__text">Gesundheit</span>
                    </span>
                </span>
            </div>
            <div class="mdc-chip mdc-chip-filter" role="row">
                <div class="mdc-chip__ripple"></div>
                <span role="gridcell">
                    <span role="button" tabindex="0" class="mdc-chip__primary-action">
                        <span class="mdc-chip__text">Ernährung</span>
                    </span>
                </span>
            </div>
            <div class="mdc-chip mdc-chip-filter" role="row">
                <div class="mdc-chip__ripple"></div>
                <span role="gridcell">
                    <span role="button" tabindex="0" class="mdc-chip__primary-action">
                        <span class="mdc-chip__text">Mathematik</span>
                    </span>
                </span>
            </div>
            <div class="mdc-chip mdc-chip-filter" role="row">
                <div class="mdc-chip__ripple"></div>
                <span role="gridcell">
                    <span role="button" tabindex="0" class="mdc-chip__primary-action">
                        <span class="mdc-chip__text">Englisch</span>
                    </span>
                </span>
            </div>
            <div class="headline-text-field">Aktuelle Tätigkeit</div>
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                <input class="mdc-text-field__input text-field__input--modified" type="text" placeholder="" aria-label="Label">
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
            <button class="mdc-button mdc-button--raised button--big">
                <span class="button-text">Registrieren</span> <span class="material-icons">chevron_right</span>
            </button>
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
                    email: '',
                    password: '',
                },
                registerData:{
                    name,
                    email: '',
                    password: '',
                    passwordConfirm: '',
                },
            }
        },
        methods: {
            handleLogin() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/login', this.formData).then(response => {
                        console.log(response);
                    });
                });
            },
            handleRegister() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/registernormal', this.registerData).then(response => {
                        console.log(response);
                    });
                });
            },
        }
    }
</script>

<style scoped>
    .text-field--modified{
        background-color:white;
        border-radius: 28px;
        box-shadow: inset 6px 6px 10px 0 rgba(0, 0, 0, 0.2),
        inset -6px -6px 10px 0 white,
        12px 12px 24px 0 rgba(0, 0, 0, 0.2),
        -12px -12px 24px 0 rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 45px;
        width: 100%;
    }

    .button--big{
        border-radius: 28px;
        height: 50px;
        width: 100%;
        margin-top: 30px;
        background: linear-gradient(to right,white, #F1F1F1);
    }

    .button-text{
        text-transform: uppercase;
        color: #212121;
        font-size: 14px;
        font-family: 'Open Sans', sans-serif;
    }

    .headline-text-field{
        margin-top: 0.8em;
    }

    .mdc-chip-filter{
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
        background: linear-gradient(to bottom right,white, #F1F1F1);
        margin: 0.15em;
        margin-bottom: 0.7em;
    }

    .pressed{
        box-shadow: inset 6px 6px 10px 0 rgba(0, 0, 0, 0.2),
            inset -6px -6px 10px 0 white,
            12px 12px 24px 0 rgba(0, 0, 0, 0.2),
            -12px -12px 24px 0 rgba(255, 255, 255, 0.5);
            overflow: hidden;
    }

    .text-field__input--modified{
        background-color: transparent;
         caret-color: black;
         border-radius: 28px;
         padding-left: 2px;

    }

    .mdc-radio__outer-circle-modified{
        background: linear-gradient(to bottom right,white, #F1F1F1);
        box-shadow:
        -5px -5px 13px #fff,
        5px 5px 13px #0e0e0e40;
        border-color: transparent;
        border: none;
    }

    .mdc-radio__inner-circle-modified{
        border-color: red;
    }

    .radio-button-label{
        margin: auto 0;
    }

    .mdc-radio .mdc-radio__native-control:enabled:checked+.mdc-radio__background .mdc-radio__outer-circle{
        box-shadow: inset 6px 6px 10px 0 rgba(0, 0, 0, 0.2),
            inset -6px -6px 10px 0 white,
            12px 12px 24px 0 rgba(0, 0, 0, 0.2),
            -12px -12px 24px 0 rgba(255, 255, 255, 0.5);
            overflow: hidden;
    }

    .mdc-radio .mdc-radio__native-control:enabled:checked+.mdc-radio__background .mdc-radio__inner-circle{
        border-color: #707070;
        width: 1px;

    }

    .text-no-account{
        padding-top: 2em;
        font-family: 'Open Sans', sans-serif;

    }

    .text-bold{
        font-weight: bold;
    }

</style>
