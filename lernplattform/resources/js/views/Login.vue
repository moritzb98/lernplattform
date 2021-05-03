<template>
    <div>
        <h1>Login</h1>
       <!-- Login Form -->
       <form action="#" @submit.prevent="handleLogin">
            <input type="email" name="email" v-model="formData.email"><br>
            <input type="password" name="password" v-model="formData.password"><br>
            <button type="submit">Login</button>
       </form>

            <h1>Login</h1>
            <div class="headline-text-field">E-Mail</div>
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                <input class="mdc-text-field__input text-field__input--modified" type="text" placeholder="" aria-label="Label">
            </label>
            <div class="headline-text-field">Passwort</div>
            <label class="mdc-text-field mdc-text-field--filled mdc-text-field--no-label text-field--modified">
                <input class="mdc-text-field__input text-field__input--modified" type="text" placeholder="" aria-label="Label">
            </label>
            <button class="mdc-button mdc-button--raised button--big">
                <span class="button-text">Einloggen</span> <span class="material-icons">chevron_right</span>
            </button>
            <div class="text-no-account">Kein Account? <span class="text-bold">Jetzt registrieren</span></div>

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
                }
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

    .headline-text-field{
        margin-top: 0.8em;
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

    .text-no-account{
        padding-top: 2em;
        font-family: 'Open Sans', sans-serif;

    }

    .text-bold{
        font-weight: bold;
    }
</style>
